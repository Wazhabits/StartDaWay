@if(!Session::has('user'))
    <form action="{{ action('DataController@MemberRegister') }}" method="post">
        {{ csrf_field() }}
        <p><label for="">Pseudo</label><input type="text" name="login" required></p>
        <p><label for="">Mots de passe</label><input type="password" name="password" required></p>
        <p><label for="">Confirmation</label><input type="password" name="confirmation" required></p>
        <p><label for="">Prénom</label><input type="text" name="firstname" required></p>
        <p><label for="">Nom</label><input type="text" name="lastname" required></p>
        <p><label for="">E-Mail</label><input type="email" name="mail" required></p>
        <p><label for="">Téléphone</label><input type="tel" name="phone" required></p>
        <button>Soumettre</button>
    </form>
    <form action="{{action('DataController@MemberConnect')}}" method="post">
        {{csrf_field()}}
        <p><label for="">Pseudo / Email</label><input type="text" name="login" required></p>
        <p><label for="">Mots de passe</label><input type="password" name="password" required></p>
        <button>Connexion</button>
    </form>
@else
    <form action="{{action('DataController@MemberUpdate')}}" method="post">
    {{csrf_field()}}
        <p><label for="">Mr/Mme</label><input type="text" value="{{Session::get('user')->lastname . " " . Session::get('user')->firstname }}" disabled></p>
        <p><label for="">Pseudo</label><input type="text" value="{{Session::get('user')->login}}" disabled></p>
        <p><label for="">Mots de passe</label><input type="password" value="noresetpassword" name="password"></p>
        <p><label for="">Confirmation</label><input type="password" value="noresetpassword" name="confirmation"></p>
        <p><label for="">E-mail</label><input type="text" value="{{Session::get('user')->email}}" name="email"></p>
        <p><button>Mettre à jour</button></p>
        <p><i>Pour toutes modifications un mail de confirmation vous sera envoyé, vous devrez réactiver votre compte.</i></p>
        <p><i>Si vous modifiez votre adresse mail, une confirmation sera envoyé sur votre nouvelle adresse et un mail d'information sera envoyé sur votre ancienne adresse.</i></p>
    </form>
    <form action="{{action('DataController@MemberDisconnect')}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>
@endif
<style>
    p{
        margin: 0;
        padding: 0;
    }
</style>