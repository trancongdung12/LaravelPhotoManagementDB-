<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Photo</title>
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
            @csrf

                <label for="">Title</label>
                <input type="text" name="title">
                <label for="">Image</label>
                <input type="file" name="image">
                <label for="">Description</label>
                <input type="text" name="description">
                    <label for="">Category</label>
                    <select name="category" id="">
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="">Tag</label>
                    <select name="tag[]" id="" multiple>
                        @foreach ($tags as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                <button type="submit">Add</button>

        </form>
</body>
</html>
