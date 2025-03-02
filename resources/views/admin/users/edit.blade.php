@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Редактируем пользователя
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      {{ Form::open(['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) }}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input name="email" value="{{ $user->email }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{ $user->getAvatar() }}" alt="" class="img-responsive" width="55">
              <label for="exampleInputFile">Аватар</label>
              <input name="avatar" type="file" id="exampleInputFile">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ route('users.index') }}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    {{ Form::close() }}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
