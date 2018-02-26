<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Start Da Way</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Item 1</a>
            </li>

            @if(!Session::has('user'))
                <!-- Button to Open the Modal -->
                <a style="display: inline-block;" class="nav-link" data-toggle="modal" data-target="#Register" href="#">S'inscire</a>
                <!-- The Modal -->
                <div class="modal fade" id="Register">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="nav-link">S'inscrire</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
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
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <li style="display: inline-block;" class="nav-item">
                    <!-- Button to Open the Modal -->
                    <a style="display: inline-block;" class="nav-link" data-toggle="modal" data-target="#Login" href="#">Se connecter</a>

                    <!-- The Modal -->
                    <div class="modal fade" id="Login">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="nav-link">Se connecter</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{action('DataController@MemberConnect')}}" method="post">
                                        {{csrf_field()}}
                                        <p><label for="">Pseudo / Email</label><input type="text" name="login" required></p>
                                        <p><label for="">Mots de passe</label><input type="password" name="password" required></p>
                                        <button>Connexion</button>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            @else
                    <li style="display: inline-block;" class="nav-item">
                        <!-- Button to Open the Modal -->
                        <a style="display: inline-block;" class="nav-link" data-toggle="modal" data-target="#Profile" href="#">Profil</a>

                        <!-- The Modal -->
                        <div class="modal fade" id="Profile">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="nav-link">Profil</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
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
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                    <form action="{{action('DataController@MemberDisconnect')}}" method="post">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Se déconnecter</button>
                    </form>
            @endif
        </ul>
    </div>
</nav>
<style>
    p {
        margin: 0;
        padding: 0;
    }
</style>