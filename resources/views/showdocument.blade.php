<!DOCTYPE html>
<html lang="en">
@include('head')
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
<div style="height:50px;"></div>
</body>
</body>
</html>