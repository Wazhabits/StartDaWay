@include("site.head")
<section class="container-fluid">
    <div class="row">
        <nav class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="menu">
            @include("site.menu")
        </nav>
    </div>
    <div class="row">
        <div class="hidden-xs-down hidden-sm-down col-md-4 col-lg-4 col-xl-4"></div>
        <main class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" id="page_main">
            @if(isset($error))
                {{$error}}
            @endif
            @if(isset($valid))
                {{$valid}}
            @endif
            <h2 class="title_gray">StartUp en vrac</h2>
            <div class="startup_preview_div">
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 startup_preview preview_red">
                    <h4>{{$startup[0]->name}}</h4>
                    <p><i>{{$startup[0]->description}}</i></p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 startup_preview preview_white">
                    <h4>{{$startup[1]->name}}</h4>
                    <p><i>{{$startup[1]->description}}</i></p>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 startup_preview preview_dgray">
                    <h4>{{$startup[2]->name}}</h4>
                    <p><i>{{$startup[2]->description}}</i></p>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 startup_preview preview_gray">
                    <h4>{{$startup[3]->name}}</h4>
                    <p><i>{{$startup[3]->description}}</i></p>

                </div>
            </div>
            <h2 class="title_red">Nouveautées</h2>
        </main>
    </div>
</section>
@include("site.footer")