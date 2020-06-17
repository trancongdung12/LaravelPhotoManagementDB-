<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Tag</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach ($photos as $item)
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td>{{$item->title}}</td>
                    <td>
                        <img src="/storage/{{$item->image}}" alt="" height="100px" width="150px">
                    </td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->description->content}}</td>
                    <td>
                        @foreach($item->tag as $tags)
                            {{$tags->name}}
                        @endforeach
                    </td>
                    <td>
                        <form action="/admin/photo/{{$item->id}}/edit" method="get">
                            <button class="btn btn-danger">Edit</button>
                        </form>
                    </td>
                    <td>
                    <form action="/admin/photo/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning">Delete</button>
                    </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
