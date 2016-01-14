
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Espace membre</title>
    <meta charset="utf-8">
</head>
<body>
@extends("/membres/default_membre")

@section('title', $title)

@section('content')

    <h1>{{$title}}</h1>
    @foreach($pseudo_membre as $users)
        <h4>Alors {{$users ->pseudo}} on veut ajouter une putain de tâche à réaliser à sa liste de merde ? </h4>
    @endforeach
    <a href="/auth/logout"><input class="btn btn-default" type="button" value="logout"/></a>
    <div class="panel-heading">
        <form method="POST" action="/membres/ajout_tache/{{$id_liste}}">
            {!! csrf_field() !!}
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nom de la tâche</th>
                    <th>Description</th>
                    <th>Date création</th>
                    <th>Accomplie/pas accomplie</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td><input type="text" name="nom_tache" size="25" maxlength="25" value="Entrez le nom de la tâche" onfocus="this.value=' '"/></td>
                    <td><input type="text" name="Description" size="70" maxlength="255" value="Entrez la description de la tâche" onfocus="this.value=' '"/></td>
                    <td><input type="date" name="date_creation"/></td>
                    <td><input type="radio" name="accomplissement" value="accomplie"/>accomplie</td> <td><input type="radio" name="accomplissement" value="pas accomplie"/>pas accomplie</td>
                </tr>
                </tbody>
                </table>
            <div class="panel-body">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <input class="btn btn-default" type="submit" value="ajouter la tâche"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

@endsection