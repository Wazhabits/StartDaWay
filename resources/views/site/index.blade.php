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
        </main>
    </div>
</section>
@include("site.footer")