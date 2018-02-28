@include("site.head")
@include("site.menu")
@if(isset($error))
    {{$error}}
@endif
@if(isset($valid))
    {{$valid}}
@endif
@if(Session::has('user'))
    @if(App\Organizations::where('owner_id', Session::get('user')->id)->count() == 1)
        <?php $org = \App\Organizations::where('owner_id',  Session::get('user')->id)->get()[0]; ?>
        <table>
            <tr>
                <td style="padding: 0 10px;">{{$org->name}}</td>
                <td style="padding: 0 10px;">{{$org->siren}}</td>
                <td style="padding: 0 10px;">{{$org->website}}</td>
                <td style="padding: 0 10px;">{{$org->ad_nbr . " " . $org->ad_type . " " . $org->ad_name . " " . $org->ad_pc . " " . $org->ad_city}}</td>
                <td style="padding: 0 10px;">Ref : {{$org->unicode}}</td>
                <td style="padding: 0 10px;">{{$org->email }}</td>
                <td style="padding: 0 10px;">{{$org->phone}}</td>
            </tr>
        </table>
    @else
        <form action="{{action('DataController@OrganizationCreate')}}" method="post">
            {{csrf_field()}}
            <p><label for="name">*Nom de l'organisation</label><input name="name" value="" placeholder="Organisation" type="text" required></p>
            <p><label for="siren">*Numéro de SIREN</label><input name="siren" value="" placeholder="123 456 789" type="text" required></p>
            <p><label for="description">*Description</label><textarea name="description" id="" cols="100" rows="10" required style="resize:none;"></textarea></p>
            <p><label for="adresse">*Adresse</label><input name="adresse" value="" placeholder="666 boulevard des anges 52100 Misère" type="text" required></p>
            <p><label for="email">*E-mail de contact</label><input name="email" type="email" placeholder="nom@domaine.fr" required></p>
            <p><label for="phone">Téléphone</label><input name="phone" value="" placeholder="0123456789" type="text"></p>
            <p><label for="site">Site web</label><input name="site" value="" placeholder="https://www.yourdomain.fr" type="url"></p>
            <p><label for="logo">Logo</label><input name="logo" value="" placeholder="logo" type="text"></p>
            <button>Créer</button>
            <p><i>Les champs précédés par une astérisque (*) sont obligatoire</i></p>
            <p><i>Vous pouvez à tout moment supprimer complètement et définitivement toutes les informations vous concernant sur simple demande</i></p>
        </form>
    @endif
@endif
@include("site.footer")