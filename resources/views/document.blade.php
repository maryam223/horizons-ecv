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
    <title>Document</title>
</head>
<body>

    @include('menu')

    <div class="container">
        <h2>Ajouter un fichier</h2>
    <form action="{{url('uploaddocument')}}" method="post" enctype="multipart/form-data">

    @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom du document</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Nom du document">
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Type de document</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_doc" id="inlineRadio1" value="covid">
                    <label class="form-check-label" for="inlineRadio1">Documents COVID</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_doc" id="inlineRadio2" value="billets">
                    <label class="form-check-label" for="inlineRadio2">Billets</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_doc" id="inlineRadio3" value="resa">
                    <label class="form-check-label" for="inlineRadio3">Réservations</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_doc" id="inlineRadio3" value="autres">
                    <label class="form-check-label" for="inlineRadio3">Autres</label>
                </div>
            </div>

        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description du document</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" placeholder="Description du document">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="file" class="form-control" name="file">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>      
        
    </form>
</div>

</body>
</html>