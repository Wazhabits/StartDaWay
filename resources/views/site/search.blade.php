@include('site.head')
<section class="container-fluid">
    <div class="row">
        <nav class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="menu">
            @include("site.menu")
        </nav>
    </div>
    <div class="row">
        <div class="hidden-xs-down hidden-sm-down col-md-4 col-lg-4 col-xl-4"></div>
        <main class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" id="page_main">
            <h2 class="title_red">Résultat de recherche pour : "{{$search}}"</h2>
            @if(count($users) > 0)
                <h3>Utilisateurs</h3>
                @foreach($users as $user)
                    <p>{{$user['firstname'] . " " . $user['lastname']}}</p>
                    <p>{{$user['email']}}</p>
                    <p>{{$user['phone']}}</p>
                    <!--<p>{$user['ad_nbr'] . " " . $user['ad_type'] . " " . $user['ad_name'] . " " . $user['ad_pc'] . " " . $user['city']}</p>-->
                @endforeach
                <br>
            @endif
            @if(count($organizations) > 0)
                <h3>Organisations</h3>
                @foreach($organizations as $organization)
                    <p>{{$organization['name']}}</p>
                    <p>{{$organization['description']}}</p>
                    <p>{{$organization['email'] . " " . $organization['phone']}}</p>
                @endforeach
                <br>
            @endif
            @if(count($jobs) > 0)
                <h3>Jobs :</h3>
                @foreach($jobs as $job)
                    <p>{{$job['title'] . " pendant une durée " . $job['duration'] . " mois"}}</p>
                    <p>Pour le compte de : {{ \App\Organizations::where('id', 'org_id')->get()[0]->name }}</p>
                @endforeach
                <br>
            @endif
            @if(count($articles) > 0)
                <h3>Articles :</h3>
                @foreach($articles as $article)
                    <p>{{$article['title']}}</p>
                    <p>{{$article['decription']}}</p>
                @endforeach
            @endif
            @if(count($articles) + count($users) + count($jobs) + count($organizations) == 0)
                Il n'y a aucun résultat pour cette recherche
            @endif
        </main>
    </div>
</section>
@include('site.footer')