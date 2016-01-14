<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edition tâche</title>
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
            <h2> Vous êtes dans la page d'édition de la tâche</h2>

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
                <form method="POST" action=/membres/edit_tache/{{$id_liste}}">
                    {!! csrf_field()!!}
                <tr>
                    <td><input type="text" name="nom_tache" size="25" maxlength="25" value="{{$tache -> nom_tache}}" onfocus="this.value=' '" /></td>
                    <td><input type="text" name="Description" size="25" maxlength="25" value="{{$tache ->Description}}" onfocus="this.value=' '" /></td>
                    <td><input type="text" name="date_creation" size="25" maxlength="25" value="{{$tache ->date_creation}}" /></td>
                    <td><input  type="text" name="accomplissement" size="25" maxlength="25" value="{{$tache ->accomplissement}}" onfocus="this.value=' '" /> <td>


                  <td> <button type="submit">valider l'édition</button></td>
                </tr>
                </form>
                @endforeach


                </tbody>

        </table>
    </div>
</body>
</html>

@endsection