
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Espace membre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
@extends("/membres/default_membre")

@section('title', $title)

@section('content')

    <h1>{{$title}}</h1>
    <div class="container">
        @foreach($name_liste as $liste)
        <h2> Vous êtes actuellement dans la liste : {{$liste ->nom_liste}}</h2>
        @endforeach
        <div class="btn-group" role="group">
           <a href="/membres/ajout_tache/{{$id_liste}}"><button type="button" class="btn btn-default" name="btn_add_tache">Ajouter une nouvelle tâche </button></a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom de la tâche </th>
                <th>Description</th>
                <th>date création</th>
                <th>accomplie/pas accomplie</th>
                <th>édition</th>
            </tr>
            </thead>
            @foreach($data_tache as $tache)
            <tbody>

            <tr>
                <td>{{$tache -> nom_tache}}</td>
                <td>{{$tache ->Description}}</td>
                <td>{{$tache ->date_creation}}</td>
                <td>{{$tache ->accomplissement}}</td>

                   <td><a href="/membres/delete_tache/{{$tache ->id}}"><button type="submit">supprimer</button></a>
                   <td><a href="/membres/tache_edition/{{$id_liste}}"><button>éditer</button></a></td>
            </tr>
            @endforeach


            </tbody>

        </table>
    </div>
</body>
</html>

@endsection