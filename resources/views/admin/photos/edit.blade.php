<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Photo</title>
    <style>
        body{
            margin-left: 35%;
            margin-top: 10%;
        }
        form {
            width: 400px;

        }
        label,input,select,button{
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Add Photo</h1>
        <form action="/admin/photo/" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <input hidden type="text" name="id" value="{{$photos->id}}">
                <label for="">Title</label>
                <input type="text" name="title" value="{{$photos->title}}">
                <label for="">Image</label>
                <img src="/storage/{{$photos->image}}" alt="" height="100px" width="100px">
                <input type="file" name="image">
                <label for="">Description</label>
                <input type="text" name="description" value="{{$descript->content}}">
                    <label for="">Category</label>
                    <select name="category" id="">
                        @foreach ($categories as $item)
                        <option
                        @if($cateSelected->id==$item->id)
                        selected
                        @endif
                        value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="">Tag</label>
                    <select name="tag[]" id="" multiple>
                        @foreach ($tags as $item)
                        <option
                            @foreach ($tagSelected as $tagSelect)
                                @if($tagSelect->tag_id==$item->id)
                                selected
                                @endif
                            @endforeach
                        value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                <button type="submit">Update</button>

        </form>
</body>
</html>
