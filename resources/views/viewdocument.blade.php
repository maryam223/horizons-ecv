<!DOCTYPE html>
<html lang="en">
@include('head')
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

<div style="height:50px;"></div>
</body>
</body>
</html>