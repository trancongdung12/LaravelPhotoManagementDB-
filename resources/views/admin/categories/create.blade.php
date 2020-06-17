<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>
        <form action="/admin/category/" method="post">
            @csrf
            <div>
                <input type="text" name="name">
                <button type="submit">Add</button>
            </div>
        </form>
</body>
</html>
