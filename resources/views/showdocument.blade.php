<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

@include('documents-list/documentcovid')
@include('documents-list/documentbillet')
@include('documents-list/documentresa')
@include('documents-list/documentautres')
    

    <div class="text-center">
    <button type="button" class="btn btn-info" onclick="window.location.href='/add-document';">Ajouter un document</button>
    </div>
</body>
</html>