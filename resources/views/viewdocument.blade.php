<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
      rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/application.css') }}" />

    <title>Document</title>
</head>
<body>
@include('menu')
    <div class="container">
    <h5>{{$data->name}}</h5>
    <p>{{$data->description}}</p>

    <iframe width="100%" src="/assets/{{$data->file}}" style="height:65vh;"></iframe>
    
    <div class="iconesview">
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
</div>


</body>
</html>