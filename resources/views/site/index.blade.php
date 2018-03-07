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
            <h2 class="title_gray">Nouvelles</h2>
            <div class="startup_preview_div">
                @foreach($last_org as $start)
                    <div class="startup_preview
                    @if ($start->id % 4 == 0)
                            preview_red
                    @endif
                    @if ($start->id % 4 == 1)
                            preview_dgray
                    @endif
                    @if ($start->id % 4 == 2)
                            preview_white
                    @endif
                    @if ($start->id % 4 == 3)
                            preview_gray
                    @endif
                    ">
                        <h4>{{$start->name}}</h4>
                        <p><i>{{$start->description}}</i></p>
                    </div>
                @endforeach
            </div>
            <h2 class="title_red">Nouveautées</h2>
        </main>
    </div>
</section>
@include("site.footer")