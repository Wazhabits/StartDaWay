<div class="collapse col-12" id="menu-start">
    @php
         if(Session::has('user')) {
               $nbr = \App\Organizations::where('owner_id', Session::get('user')->id)->count();
               if ( $nbr == 1) {
                    $org = \App\Organizations::where('owner_id', Session::get('user')->id)->get()[0];
    @endphp
    <form action="{{action('DataController@OrganizationUpdate')}}" method='post' class="row">
        {{csrf_field()}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 start-update">
            <h3 class="col-12">Informations</h3>
            <label for="" class="col-12">SIREN</label>
            <input name='sirens' type="text" maxlength="9" minlength="9" value="{{$org->siren}}" disabled class="col-12">
            <input name='siren' type="text" maxlength="9" minlength="9" value="{{$org->siren}}" hidden>
            <label for="" class="col-12">Référence</label>
            <input name='references' type="text" value="{{$org->unicode}}" disabled class="col-12">
            <input name='reference' type="text" value="{{$org->unicode}}" hidden>
            <label for="" class="col-12">* Entreprise</label>
            <input name='name' type="text" value="{{$org->name}}" class="col-12">
            <label for="" class="col-12">site web</label>
            <input name='website' type="url" value="{{$org->website}}" class="col-12">
            <label for="" class="col-12">Logo</label>
            <input name='logo' type="url" value="{{$org->logo}}" class="col-12">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 start-update">
            <h3 class="col-12">Description</h3>
            <textarea name="description" class="col-12">{{$org->description}}</textarea>
       </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 start-update">
            <h3 class="col-12">Contact</h3>
            <label for="" class="col-12">* Téléphone</label>
            <input name='phone' type="tel" value="{{$org->phone}}" class="col-12">
            <label for="" class="col-12">* Adresse mail</label>
            <input name='mail' type="email" value="{{$org->email}}" class="col-12">
            <label for="" class="col-12">* Adresse postale</label>
            <input name='adresse' type="text" value="{{$org->ad_nbr . " " . $org->ad_type . " " . $org->ad_name . " " . $org->ad_pc . " " . $org->ad_city}}" class="col-12">

            <button class="col-12 right">Mettre à jour <i class="fas fa-check"></i></button>
        </div>
        <div class="col-12 startup-member row">
            <h3 class="col-12">Membres</h3>
            <table class="col-12">
                <tr >
                    <th class="col-4">Nom complet</th><th class="col-6">Adresse mail</th><th class="col-2">Poste</th>
                </tr>
            @php
                $members = \App\OrgUsers::where('org_id', $org->id)->get();
                foreach($members as $member) {
                    $user = \App\Users::where('id', $member->user_id)->get()[0];
                    $role = \App\Roles::where('id', $member->role_id)->get()[0];
                @endphp
                <tr>
                    <td class="col-4">{{$user->firstname . " " . $user->lastname}}</td>
                    <td class="col-6">{{$user->email}}</td>
                    <td class="col-2">{{$role->role}}</td>
                </tr>
                @php
                }
            @endphp
            </table>
        </div>
        @php
            } else {
            @endphp
        <form action="{{action('DataController@OrganizationCreate')}}" method="post" class="row">
            {{csrf_field()}}
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 colg-xl-4 start-update">
                <label  class="col-12" for="">SIREN</label>
                <input class="col-12" type="text" placeholder="123 456 789" maxlength="9" minlength="9">
                <label  class="col-12" for="">Nom</label>
                <input  class="col-12" type="text" placeholder="StartDaWay" maxlength="50">
                <label  class="col-12" for="">Site Web</label>
                <input class="col-12" type="url" placeholder="www.votresite.com">
                <label  class="col-12" for="">Adresse</label>
                <input  class="col-12" type="text" placeholder="33 boulevard du massacre 44100 Nantes">
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-5 start-update">
                <label  class="col-12" for="">Description</label>
                <textarea class="col-12" name="" rows="25" placeholder="Référence ta StartUp, montres toi ! Et gagne en notoriété"></textarea>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 col-xl-3 start-update">
                <div class="col-12">
                    <label  class="col-12" for="">E-mail</label>
                    <input  class="col-12" type="text" placeholder="votre@domain.fr">
                    <label  class="col-12" for="">Téléphone</label>
                    <input  class="col-12" type="text" placeholder="0123456789">
                </div>
                <button class="col-12">Créer ma StartUp</button>
            </div>
        </form>
            @php
            }
        }
        @endphp
    </form>
</div>