<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{   
    use SoftDeletes;
    use Notifiable;

    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {   
        #Удаляем аватарку пользователя из папки public/uploads
        $this->removeAvatar();
        
        #Удаляем пользователя
        $this->delete();
    }

    #Генерация пароля
    public function generatePassword($password)
    {
        if ($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    #Загрузка аватарки пользователя
    public function uploadAvatar($image)
    {   
        if($image == null) { return; }

        #Удаляем аватар пользователя из папки public/uploads
        $this->removeAvatar();

        #Генерируем название аватара: AdaamfsnETEN.png
        $filename = 'AVATAR-' . Str::random(10) . '.' . $image->extension();

        #Сохраняем аватар в папку public/uploads
        $image->storeAs('uploads', $filename);

        #Сохраняем значение в поле 'avatar' у текущего Пользователя
        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if ($this->avatar != null) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function getAvatar()
    {   
        if ($this->avatar == null) {
            return '/img/no-avatar.png';
        }
        
        return '/uploads/' . $this->avatar;
    }

    public function makeAdmin()
    {
        $this->is_admin = 1;
        $this->save();
    }

    public function makeNormal()
    {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if ($value == null) {
            return $this->makeNormal();
        }
        
        return $this->makeAdmin();
    }

    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan($value)
    {
        if ($value == null) {
            return $this->unban();
        }
        
        return $this->ban();
    }
}
