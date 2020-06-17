<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use App\Category;
use App\Tag;
use App\Taggable;
use App\PhotoDescription;


class PhotoController extends Controller
{
    function index(){
        $photos = Photo::all();
        foreach ($photos as $photo) {
           $photo->category;
           $photo->tag;
           $photo->description;
        }
        return view('admin.photos.index',['photos'=>$photos]);
        // echo "<pre>".json_encode($photos,JSON_PRETTY_PRINT)."</pre>";

    }
    function create(){
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.photos.create',['categories'=>$category,'tags'=>$tag]);
    }
    function store(Request $request){
       $title= $request->input('title');
       $image= $request->file('image')->store('public');
       $category= $request->input('category');
       $descrip= $request->input('description');
       $arrtag= $request->input('tag');

       $photos = new Photo();
       $photos->title = $title;
       $photos->image = $image;
       $photos->category_id= $category;
       $photos->save();

       $description = new PhoToDescription();
       $description->id = $photos->id;
       $description->content = $descrip;
       $description->save();

       for($i = 0 ;$i< count($arrtag);$i++){
        $taggable = new Taggable();
        $taggable->tag_id = $arrtag[$i];
        $taggable->photo_id = $photos->id;
        $taggable->save();
       }

       return redirect('admin/photo/');
    }
    function destroy($id){
        PhotoDescription::where('id',$id)->delete();
        Taggable::where('photo_id',$id)->delete();
        Photo::find($id)->delete();
         return redirect('admin/photo');
     }
     function edit ($id){
        $photo = Photo::find($id);
        $descript = PhotoDescription::find($id);
        $categorySelected = Category::find($photo->category_id);
        $category = Category::all();
        $tag = Tag::all();
        $tagSeleted = Taggable::where('photo_id',$id)->get();
         return view('admin.photos.edit',['photos'=>$photo,'descript'=>$descript,
         'categories'=>$category,'cateSelected'=>$categorySelected,'tags'=>$tag,'tagSelected'=>$tagSeleted]);
     }
     function update(Request $request){
       $photos = Photo::find($request->id);

       $title= $request->input('title');

       $image= $request->file('image');
       if($image){
        $image = $request->file('image')->store('public');
       }else{
        $image =$photos->image;
       }

       $category= $request->input('category');
       $descrip= $request->input('description');
       $arrtag= $request->input('tag');

       $photos->title = $title;
       $photos->image = $image;
       $photos->category_id= $category;
       $photos->save();

       $description = PhoToDescription::find($request->id);
       $description->id = $photos->id;
       $description->content = $descrip;
       $description->save();
       Taggable::where('photo_id',$request->id)->delete();

       for($i = 0 ;$i< count($arrtag);$i++){
        $taggable = new Taggable();
        $taggable->tag_id = $arrtag[$i];
        $taggable->photo_id = $photos->id;
        $taggable->save();
       }

       return redirect('admin/photo/');

     }
}
