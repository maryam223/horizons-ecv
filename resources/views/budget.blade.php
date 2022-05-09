<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Budget</title>
</head>
<body>
    <div>
        <h2> Budget dépensé :
        @foreach ($budget as $budget)
            {{ $budget->amount }} euros
        @endforeach
        </h2>
        
    </div>
    <div class="container">
    <form action="{{url('storebudget')}}" method="post" enctype="multipart/form-data">

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
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ajouter la dépense</button>
            </div>
        </div>      
        
    </form>
</div>

<div>
@foreach($data as $data)

<ul class="list-group mb-4">
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

</body>
</html>