<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use App\Taggable;

class TagController extends Controller
{
    function index(){
        $tag = Tag::all();
        return view('admin.tags.index',['tags'=>$tag]);
    }
    function create(){
        return view('admin.tags.create');
    }
    function store(Request $request){
        $name =$request->input('name');
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();
        return redirect('admin/tag');
    }
    function destroy($id){
        Taggable::where('tag_id',$id)->delete();
        Tag::find($id)->delete();
        return redirect('admin/tag');
    }
    function edit($id){
        $tag = Tag::find($id);
        return view('admin.tags.edit',['tag'=>$tag]);
    }
    function update(Request $request){
        $tag = Tag::find($request->id);
        $name =$request->input('name');
        $tag->name =$name;
        $tag->save();
        return redirect('admin/tag');
    }
}
