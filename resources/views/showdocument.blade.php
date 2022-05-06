<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border="1px">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>View</th>
        <th>Download</th>
        <th>Delete</th>
    </tr>

    @foreach($data as $data)

    <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->description}}</td>
        <td><a href="{{url('/view',$data->id)}}">View</a></td>
        <td><a href="{{url('/download',$data->file)}}">Download</a></td>
        <td><a href="{{url('/delete',$data->id)}}">Delete</a></td>
    </tr>
    
    @endforeach
    </table>
</body>
</html>