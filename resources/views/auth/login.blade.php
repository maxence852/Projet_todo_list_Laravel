@extends("default")

@section('title')
    {{$title}}
@endsection

@section('content')



    <p style="text-align: right">
    <?php
    setlocale(LC_ALL, "fr");
    echo gmstrftime("%A %d %B %Y %H h %M m %S s",time());
    ?>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <p>

            <label for="email">Votre e-mail :</label> <!--le for sert à lier le label au champ -->
            <input type="email" name="email" value="{{ old('email') }}"/>
            <label for="password"> Votre mot de passe :</label>
            <input type="password" name="password" id="password"/>
            <input type="checkbox" name="remember"> se souvenir de mon passage
            <button type="submit">Login</button>
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/auth/register" title="page d'inscription"target="blank">S'inscrire</a></b>
        </p>
    </form>





@endsection
