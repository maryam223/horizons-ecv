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

    <title>Document</title>
</head>
<body>

@include('menu')

<h4>Mes documents</h4>

<div class="container">
@include('documents-list/documentcovid')
@include('documents-list/documentbillet')
@include('documents-list/documentresa')
@include('documents-list/documentautres')
    

    <div class="text-center mt-2">
    <button type="button" class="btn btn-info" onclick="window.location.href='/add-document';">Ajouter un document</button>
    </div>
</container>

</body>
</html>