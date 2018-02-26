<p><strong>Bonjour {{ $user->firstname . " " . $user->lastname }} !</strong></p>
<p>Pour confirmer le changement d'adresse mail veuillez cliquer sur <a href="{{"http://localhost:8000/activation/".$user->unicode}}">ce lien</a></p>
<p>Bien cordialement, StartDaWay</p>