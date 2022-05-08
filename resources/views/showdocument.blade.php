<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Document</title>
</head>
<body>

    @foreach($data as $data)

    <ul class="list-group mb-4">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
            <h4>{{$data->name}}</h4>
            <p>{{$data->description}}</p>
            </div>
            <div>
            <a href="{{url('/view',$data->id)}}" style="color:#5f6368;">    
            <span class="material-icons">
                visibility
            </span>
            </a>
            <a href="{{url('/download',$data->file)}}" style="color:#5f6368;">
            <span class="material-icons">
                file_download
            </span>
            </a>
            <a href="{{url('/delete',$data->id)}}" style="color:#5f6368;">
            <span class="material-icons">
                delete
            </span>
            </a>
            </div>
        </li>
    </ul>
    
    @endforeach

    <div class="text-center">
    <button type="button" class="btn btn-info" onclick="window.location.href='/add-document';">Ajouter un document</button>
    </div>
</body>
</html>