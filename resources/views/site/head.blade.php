<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    @include("site.include_head")
    <title>StartDaWay | StartUp Referencer,  montrez vous, exposez vous et gagnez en popularité</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><i class="fas fa-power-off"></i> StartDaWay</div>
            <form method="post" action="{{action("DataController@Search")}}" id="search" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                {{csrf_field()}}
                <label id="search_label" for="search_input"><i class="fas fa-search"></i></label>
                <input id="search_input" type="text" name="search" placeholder="Rechercher ...">
            </form>
        </div>
        <div class="col-1"></div>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 row">
            @include("site.menu.top_user")
            @include("site.menu.top_jobmenu")
            @if (Session::has('user'))
                @include("site.menu.top_startup")
            @endif
        </div>
    </div>
</div>