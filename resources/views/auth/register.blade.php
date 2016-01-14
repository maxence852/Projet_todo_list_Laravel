@extends("default")

@section('title', $title)

@section('content')
<h1>{{$title}}</h1>
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <fieldset>
        <legend><b>Vos coordonnées</b></legend>
        <table border="0">
            <tr>
                <td>Votre nom : </td>
                <td><input type="text" name="name" size="25" maxlength="25" value="{{old('name')}}" onfocus="this.value=' '"/></td>
            </tr>

            <tr>
                <td>Votre prénom :</td>
                <td><input type="text" name="prenom" size="25" maxlength="25" value="{{old('prenom')}}" onfocus="this.value=' '"/></td>
            </tr>
            <tr>
                <td>votre pseudo :</td>
                <td><input type="text" name="pseudo" size="25" maxlength="25" value="{{old('pseudo')}}" onfocus="this.value=' '"/></td>
            </tr>
            <tr>
                <td>Votre e-mail :</td>
                <td><input type="email" name="email" size="50" maxlength="50" value="{{old('email')}}" onfocus="this.value=' ' " pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4}"/></td>
            </tr>
            <!-- les valeurs du pattern permettent de respecter le format d'une adresse e-mail -->
            <tr>
                <td>Votre mot de passe : </td>
                <td><input type="password" name="password" size="12" maxlength="30"/></td>
            </tr>
            <tr>
                <td>confirmation mot depasse : </td>
                <td><input type="password" name="password_confirmation" size="12" maxlength="30"/></td>
            </tr>
            <tr>
                <td>Votre numéro de Téléphone/GSM : </td>
                <td><input type="tel" name="tel" value="{{old('tel')}}" onfocus="this.value=' '" pattern="^0[0-9]{9}"/></td>
            </tr>
            <tr>
                <td>Votre pays : </td>
                <td><select name="pays" size="1">
                        <option value="Allemagne">Allemagne</option>
                        <option value="Autriche">Autriche</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Bulgarie">Bulgarie</option>
                        <option value="Chypre">Chypre</option>
                        <option value="Croatie">Croatie</option>
                        <option value="Danemark">Danemark</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Estonie">Estonie</option>
                        <option value="Finlande">Finlande</option>
                        <option value="France">France</option>
                        <option value="Grèce">Grèce</option>
                        <option value="Hongrie">Hongrie</option>
                        <option value="Irlande">Irlande</option>
                        <option value="Italie">Italie</option>
                        <option value="Lettonie">Lettonie</option>
                        <option value="Lituanie">Lituanie</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Malte">Malte</option>
                        <option value="Pays-Bas">Pays-Bas</option>
                        <option value="Pologne">Pologne</option>
                        <option value="Portugal">Portugal</option>
                        <option value="République tchèque">République tchèque</option>
                        <option value="Roumanie">Roumanie</option>
                        <option value="Royaume-Uni">Royaume-Uni</option>
                        <option value="Slovaquie">Slovaquie</option>
                        <option value="Slovénie">Slovénie</option>
                        <option value="Suède">Suède</option>
                    </select></td>
            </tr>
        </table>
    </fieldset><br>

    <fieldset>
        <legend><b>Vos informations personnelles</b></legend>
        <table border="0">
            <tr>
                <td>Votre date de naissance : </td>
                <td><input type="date" name="date" min="1910-01-01" max="2003-01-01"/></td>
            </tr>
            <tr>
                <td>Sexe :</td>
                <td><input type="radio" name="genre" value="Homme"/>Homme</td> <!-- Faudrait régler l'espacement entre les checkbox -->

                <td><input type="radio" name="genre" value="Femme"/>Femme </td>

            </tr>

            <tr>
                <td>Votre code postal : </td>
                <td><input type="number" name="numpostal" min="1" max="9999"/></td>
            </tr>
            <tr>
                <td>Votre ville : </td>
                <td><input type="text" name="nomville" size="25" maxlength="25"/></td>
            </tr>
            <tr>
                <td>Votre nom de rue : </td>
                <td><input type="text" name="nomrue" size="25" maxlength="25"/></td><td>Numéro : </td><td><input type="number" name="numerorue" pattern="^0[0-9]{9}"/></td>
            </tr>
        </table>
    </fieldset><br>
    <input type="submit" value="Envoyer"/>
    <input type="button" value="annuler" onclick="self.location.href='/auth/login'"/>

</form>
@endsection