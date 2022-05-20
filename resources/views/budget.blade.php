<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
      rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ url('/css/application.css') }}" />

    <style>

@property --p{
  syntax: '<number>';
  inherits: true;
  initial-value: 0;
}
        
.pie {
  --p:20;
  --b:12px;
  --w:150px;
  
  width:var(--w);
  aspect-ratio:1;
  position:relative;
  display:inline-grid;
  place-content:center;
  font-size:25px;
  font-weight:bold;
}
.pie:before,
.pie:after {
  content:"";
  position:absolute;
  border-radius:50%;
}
.pie:before {
  inset:0;
  background:
    radial-gradient(farthest-side,lightgreen 98%,#0000) top/var(--b) var(--b) no-repeat,
    conic-gradient(lightgreen calc(var(--p)*1%),#007bff17 0);
  -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
          mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
}
.pie:after {
  inset:calc(50% - var(--b)/2);
  background:lightgreen;
  transform:rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
}
.animate {
  animation:p 2s .5s both;
}

@keyframes p {
  from{--p:0}
}
    </style>
    <title>Budget</title>
</head>
<body>
@include('menu-top')
@include('menu')
    <div style="display:none;">
        <h2> Budget total :
            @foreach ($budgetTotal as $budgetTotal)
                {{ $budgetTotal->budget_total }} euros
             @endforeach
        </h2>
    </div>
    <div>
        <div> Budget dépensé :
        @foreach ($budget as $budget)
            {{ $budget->amount }} euros
        @endforeach
        </div>
        
    </div>
    <div class="budgetpie mt-3 mb-3">
    <div class="pie animate" style="--p:{{ ($budget->amount*100)/$budgetTotal->budget_total }};"> {{ $budgetTotal->budget_total }} €</div>
    </div>
    <div class="container">
    <form action="{{url('/storebudget',$budgetTotal->id)}}" method="post" enctype="multipart/form-data">

    @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom de la dépense</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Nom de la dépense">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Montant</label>
            <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="amount_depense" placeholder="Montant (en euros)">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 text-center">
                <button type="submit" class="btn btn-primary" style="background-color:#4A69BD!important;">Ajouter la dépense</button>
            </div>
        </div>      
        
    </form>
</div>

<div>
@foreach($data as $data)

<ul class="list-group mb-2">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
        <h4>{{$data->title}}</h4>
        </div>
        <div>
        <p>{{$data->amount_depense}} euros</p>
        </div>
    </li>
</ul>

@endforeach
</div>
<div style="height:50px;"></div>
</body>
</html>