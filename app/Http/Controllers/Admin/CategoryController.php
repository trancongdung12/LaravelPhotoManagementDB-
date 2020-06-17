<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Photo;
use App\Taggable;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        return view('admin.categories.index',['categories'=>$category]);
    }
    function create(){
        return view('admin.categories.create');
    }
    function store(Request $request){
        $name =$request->input('name');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect('admin/category');
    }
    function destroy($id){
        Photo::where('category_id',$id)->delete();
        Category::find($id)->delete();
        return redirect('admin/category');
    }
    function edit($id){
        $category = Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
    }
    function update(Request $request){
        $category = Category::find($request->id);
        $name =$request->input('name');
        $category->name =$name;
        $category->save();
        return redirect('admin/category');
    }
}
