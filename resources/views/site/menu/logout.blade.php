<h3>Se connecter<a class="collapser" data-toggle="collapse" href="#connection_collapse"><i class="fas fa-sort-down"></i></a></h3>
<div id="connection_collapse" class="collapse">
    <form action="{{action('DataController@MemberConnect')}}" method="post" id="connection">
        {{csrf_field()}}
        <input style="display:none;" type="text" name="fackdachrome" />
        <input style="display:none;" type="password" name="fackdachromes" />
        <input class="connection_input" type="text" name="login" placeholder="Pseudo / E-mail"  autocomplete="off" required>
        <input class="connection_input" type="password" name="password" placeholder="Password"  autocomplete="off" required>
        <p></p>
        <button id="connection_button" type="submit">Connexion <span><i class="fas fa-arrow-right"></i></span></button>
    </form>
</div>
<hr>
<h3>Nous rejoindre<a class="collapser" data-toggle="collapse" href="#register_collapse"><i class="fas fa-sort-down"></i></a></h3>
<div id="register_collapse" class="collapse">
    <form action="{{ action('DataController@MemberRegister') }}" method="post" id="register">
        {{ csrf_field() }}
        <p>Authentification</p>
        <input type="text" name="login" placeholder="Pseudo" class="register_input"  autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" class="register_input"  autocomplete="off" required>
        <input type="password" name="confirmation" placeholder="Confirmation" class="register_input"  autocomplete="off" required>
        <p>Informations Personnelles</p>
        <input type="text" name="firstname" placeholder="Prénom" class="register_input"  autocomplete="off" required>
        <input type="text" name="lastname" placeholder="Nom" class="register_input"  autocomplete="off" required>
        <p>Contact</p>
        <input type="email" name="mail" placeholder="E-Mail" class="register_input"  autocomplete="off" required>
        <input type="tel" name="phone" placeholder="Téléphone" class="register_input"  autocomplete="off" required>
        <p>Adresse</p>
        <input type="text" name="address" placeholder="XX boulevard de l'égalité 44000 Nantes" class="register_input" required>
        <button id="register_button">Soumettre <span><i class="fas fa-arrow-right"></i></span></button>
    </form>
</div>
<hr>