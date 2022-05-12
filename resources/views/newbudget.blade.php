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
        
        
    </div>
    <div class="container">
    <form action="{{url('storenewbudget')}}" method="post" enctype="multipart/form-data">

    @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom du voyage</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" placeholder="Nom du voyage">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Budget total pour ce voyage</label>
            <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="budget_total" placeholder="Budget (en euros)">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ajouter le budget pour ce voyage</button>
            </div>
        </div>      
        
    </form>

    <div>
        <form>
        <div>
        <h2> Mes budgets voyages
            @foreach ($budgetTotal as $budgetTotal)
                <a href="{{url('/budget',$budgetTotal->id)}}">
                    <h5>{{ $budgetTotal->title }}</h5>
                    <p>{{ $budgetTotal->budget_total }} euros</p>
                </a>
             @endforeach
        </h2>
    </div>

        </form>
    </div>
</div>


</body>
</html>