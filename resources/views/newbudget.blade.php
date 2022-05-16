<!DOCTYPE html>
<html lang="fr">
@include('head')
<body>

@include('menu-top')

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
            <h2> Mes budgets voyages</h2>
            <div class="mesvoyages">
                @foreach ($budgetTotal as $budgetTotal)
                    <div class="bg-white monbudgetvoyage">
                    <a href="{{url('/budget',$budgetTotal->id)}}" class="text-dark">
                        <h5 class="font-weight-bold">{{ $budgetTotal->title }}</h5>
                        <p class="font-italic mb-0">{{ $budgetTotal->budget_total }} euros</p>
                    </div>    
                    </a>
                @endforeach
            </div>
        </div>
        </form>
    </div>
</div>

@include('menu')
<div style="height:50px;"></div>

</body>
</html>