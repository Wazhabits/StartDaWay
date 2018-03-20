<div class="collapse col-12" id="menu-user">
    @if(!Session::has('user'))
        <form action="{{action('DataController@MemberConnect')}}" method="post" class="register row">
             {{csrf_field()}}
            <p class="col-12">Se connecter</p>
            <div class="col-3"></div>
            <div class="col-6 register_col">
                <input style="display:none;" type="text" name="fackdachrome" />
                <input style="display:none;" type="password" name="fackdachromes" />
                <label for="" class="col-12">Pseudo</label>
                <input class="col-12" type="text" name="login" placeholder="Pseudo / E-mail"  autocomplete="off" required>
                <label for="" class="col-12">Mots de passe</label>
                <input class="col-12" type="password" name="password" placeholder="Mots de passe"  autocomplete="off" required>
                <button class="col-12" type="submit">Connexion<i class="fas fa-angle-double-right"></i></button>
            </div>
            <div class="col-3"></div>
        </form>
        <hr>
        <form action="{{action('DataController@MemberRegister') }}" method="post" class="register row">
            {{ csrf_field() }}
            <p class="col-12">Nous rejoindre !</p>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 register_col">
                <p class="col-12">Authentification</p>
                <label class="col-12" for="">Pseudo</label>
                <input type="text" name="login" placeholder="Pseudo" class="col-12"  autocomplete="off" required>
                <label class="col-12" for="">Phrase de passe</label>
                <input type="password" name="password" placeholder="Password" class="col-12"  autocomplete="off" required>
                <label class="col-12" for="">Confirmation</label>
                <input type="password" name="confirmation" placeholder="Confirmation" class="col-12"  autocomplete="off" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 register_col">
                <p class="col-12">Informations Personnelles</p>
                <label class="col-12" for="">Prénom</label>
                <input type="text" name="firstname" placeholder="Prénom" class=" col-12"  autocomplete="off" required>
                <label class="col-12" for="">Nom</label>
                <input type="text" name="lastname" placeholder="Nom" class="col-12"  autocomplete="off" required>
                <label class="col-12" for="">Adresse</label>
                <input type="text" name="address" placeholder="XX boulevard de l'égalité 44000 Nantes" class="register_input col-12" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 register_col">
                <p class="col-12">Contact</p>
                    <label class="col-12" for="">Adresse mail</label>
                    <input type="email" name="mail" placeholder="E-Mail" class=" col-12"  autocomplete="off" required>
                    <label class="col-12" for="">Téléphone</label>
                    <input type="tel" name="phone" placeholder="Téléphone" class="col-12"  autocomplete="off" required>
            </div>
            <div class="col-3"></div>
            <div class="col-6"><button class="col-12">Soumettre <i class="fas fa-gavel"></i></button></div>
            <div class="col-3"></div>
        </form>
        <hr>
    @else
        <form action="{{action('DataController@MemberUpdate')}}" method="post" class="update_profil">
            <div class="row">
                <p class="col-12">Mr/Mme <strong>{{ Session::get('user')->lastname . " " . Session::get('user')->firstname }}</strong></p>
                {{csrf_field()}}
                <div class="col-6">
                    <p>Attention, si vous modifier votre profil, un mail de confirmation vous sera envoyé.</p>
                    <p>ce mail contiendra un lien pour réactiver votre compte.</p>
                </div>
                <div class="col-6">
                    <label for="" class="col-12">E-Mail</label>
                    <input type="text" value="{{Session::get('user')->email}}" name="email" class="col-12" autocomplete="off" >
                    <label for="" class="col-12">Phrase de passe</label>
                    <input type="password" value="noresetpassword" name="password" class="col-12" autocomplete="off" >
                    <label for="" class="col-12">Confirmation</label>
                    <input type="password" value="noresetpassword" name="confirmation" class="col-12" autocomplete="off" >
                    <div class="col-8"></div>
                    <button class="col-4">Mettre à jour <i class="fas fa-check"></i></button>
                </div>
            </div>
        </form>
        <hr>
    @endif
</div>

<style>
    .update_profil>div>p {
        font-size: 22px;
    }
</style>