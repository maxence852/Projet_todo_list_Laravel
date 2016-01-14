
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
    <a href="/auth/logout"><input type="button" value="logout"/></a>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <form method="POST" action="/membres/edit_list/{{$id_liste}}">
            {!! csrf_field() !!}
        <div class="panel-heading" ><input type="text" name="name_liste" size="25" maxlength="25" value="modifier le nom de la liste" onfocus="this.value=' ' "/> </div>

        <div class="panel-body">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                        <a><input class="btn btn-default" type="submit" value="modifier"/></a>
                </div>
            </div>
        </div>
            </form>
    </div>
</body>
</html>

@endsection