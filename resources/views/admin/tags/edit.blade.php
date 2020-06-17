<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tag</title>
</head>
<body>
    <h1>Edit Tag</h1>
        <form action="/admin/tag/" method="post">
            @method('PATCH')
            @csrf
            <div>
                <input hidden type="text" name="id" value="{{$tag->id}}">
            <input type="text" name="name" value="{{$tag->name}}">
                <button type="submit">Update</button>
            </div>
        </form>
</body>
</html>
