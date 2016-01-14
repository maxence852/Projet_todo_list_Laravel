
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
        <h2>Bonjour {{$users ->pseudo}}</h2>            <!-- pour afficher le champs voulu qui se trouve ds la base de donnée il faut faire un foreach. Dont $users est le nom de la table et pseudo le champ défini ds cette table. le reste se fait via le controller-->
        @endforeach

        <a href="/auth/logout"><input class="btn btn-default" type="button" value="logout"/></a>
        <div class="btn-group" role="group">
            <a href="/membres/ajout_list"> <button type="button" class="btn btn-default">Ajouter une nouvelle liste</button></a>
        </div>

        <!-- Le foreach permet de récupérer le tableau de la base de donnée pour ensuite les afficher-->
        @foreach ($name_liste as $liste)
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">{{$liste ->nom_liste}}</div>  <!--nom_liste = variable ds la bdd -->
                <div class="panel-body">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <a href="/membres/modif_list/{{$liste -> id}}"><button type="button" class="btn btn-default">Modifier cette liste</button></a>
                        </div>
                        <div class="btn-group" role="group">
                           {!! csrf_field() !!} <a href="/membres/delete_liste/{{$liste ->id}}"><button type="submit" class="btn btn-default">Supprimer cette liste</button></a>

                        </div>
                        <div class="btn-group" role="group">
                            <a href="/membres/liste_tache/{{$liste -> id}}"><button type="button" class="btn btn-default">consulter la liste de tâche</button></a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </body>
    </html>

@endsection