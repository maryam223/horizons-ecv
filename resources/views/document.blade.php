<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{url('uploaddocument')}}" method="post" enctype="multipart/form-data">

    @csrf

        <input type="text" name="name" placeholder="Nom du document">
        <input type="text" name="description" placeholder="Description du document">
        <input type="file" name="file">
        <input type="submit" name="Envoyer">
    </form>

</body>
</html>