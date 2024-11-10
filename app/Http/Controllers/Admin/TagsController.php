<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {   
        $tags = Tag::all();
        // $tags = Tag::withTrashed()->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, ['title' => 'required']);
        Tag::create($request->all());
        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        // $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required']);
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tags.index');
    }
}
