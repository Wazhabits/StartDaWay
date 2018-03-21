<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    @include("site.include_head")
    <meta name="description" content="StartDaWay est une plateforme de référencement des startup françaises mais aussi équipé d'un Job-Board qui leur est déstiné">
    <title>StartDaWay | StartUp Referencer,  montrez vous, exposez vous et gagnez en popularité</title>
</head>
<body>
<div class="container-fluid top-nav">
    @include("site.menu")
</div>

<div class="container-fluid">
    <div class="row top-bar">
        <span id="logo_title" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 "><div id="sitename">StartDaWay</div> <div id="sitepunchline">< StartUp Referencer /></div></span>
        <form method="post" action="{{action("DataController@Search")}}" id="search" class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
            {{csrf_field()}}
            <label id="search_label" for="search_input"><i class="fas fa-search"></i></label>
            <input id="search_input" type="text" name="search" placeholder="Rechercher ...">
        </form>
    </div>
</div>

<div class="container-fluid">
    <div class="row collapser">
        @include("site.menu.top_user")
        @include("site.menu.top_jobmenu")
        @if (Session::has('user'))
            @include("site.menu.top_startup")
        @endif
    </div>
</div>
<section class="container-fluid" id="Page">
    <main id="page_main" class="row">