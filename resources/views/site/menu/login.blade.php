<p><form action="{{action('DataController@MemberDisconnect')}}" method="post">{{csrf_field()}}<button type="submit" class="btn btn-danger" id="disconnect"><i class="fas fa-power-off"></i></button></form>Mr/Mme {{Session::get('user')->lastname . " " . Session::get('user')->firstname }}<a class="collapser" data-toggle="collapse" href="#profile"><i class="far fa-user"></i> <i class="fas fa-sort-down"></i></a></p>
<div id="profile" class="collapse">
    <p></p>
    <form action="{{action('DataController@MemberUpdate')}}" method="post" id="update">
        {{csrf_field()}}
        <p><strong>{{Session::get('user')->login }}</strong></p>
        <p class="information"><i>Pour toutes modifications un mail de confirmation vous sera envoyé, vous devrez réactiver votre compte.</i></p>
        <p class="information"><i>Si vous modifiez votre adresse mail, une confirmation sera envoyé sur votre nouvelle adresse et un mail d'information sera envoyé sur votre ancienne adresse.</i></p>
        <input type="text" value="{{Session::get('user')->email}}" name="email" class="update_input" autocomplete="off" >
        <input type="password" value="noresetpassword" name="password" class="update_input" autocomplete="off" >
        <input type="password" value="noresetpassword" name="confirmation" class="update_input" autocomplete="off" >
        <p></p>
        <button id="update_submit">Mettre à jour <span><i class="fas fa-arrow-right"></i></span></button>
    </form>
</div>
<hr>
<h3>StartUp <a class="collapser" data-toggle="collapse" href="#menu_organization"><i class="far fa-building"></i> <i class="fas fa-sort-down"></i></a></h3>
<div id="menu_organization" class="collapse">
    <a href="/org/create/">Montrer ma Startup</a>
</div>
<hr>
<h3>Messagerie <a class="collapser" data-toggle="collapse" href="#menu_tickets"><i class="far fa-comments"></i> <i class="fas fa-sort-down"></i></a></h3>
<div id="menu_tickets" class="collapse">
    AAA
</div>
<hr>
<h3>Mes Jobs <a class="collapser" data-toggle="collapse" href="#menu_jobs"><i class="fas fa-suitcase"></i> <i class="fas fa-sort-down"></i></a></h3>
<div id="menu_jobs" class="collapse">
    AAA
</div>
<hr>