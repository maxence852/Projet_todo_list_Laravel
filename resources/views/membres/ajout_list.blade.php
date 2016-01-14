
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
    <h4>Alors {{$users ->pseudo}} on veut créer une nouvelle liste ? </h4>
    @endforeach
    <a href="/auth/logout"><input class="btn btn-default" type="button" value="logout"/></a>
    <div class="panel-heading">
        <form method="POST" action="/membres/ajout_list">
            {!! csrf_field() !!}
    <div class="panel panel-default">
        <!-- Default panel contents -->
                <input type="text"name="nom_liste" size="151" maxlength="100" value="nom de la nouvelle liste" onfocus="this.value=''">
        </div>
        <div class="panel-body">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <input class="btn btn-default" type="submit" value="ajouter"/>
                </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>

@endsection