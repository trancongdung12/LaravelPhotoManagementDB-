<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
</head>
<body>
    <h1>Edit Category</h1>
        <form action="/admin/category/" method="post">
            @method('PATCH')
            @csrf
            <div>
                <input hidden type="text" name="id" value="{{$category->id}}">
            <input type="text" name="name" value="{{$category->name}}">
                <button type="submit">Update</button>
            </div>
        </form>
</body>
</html>
