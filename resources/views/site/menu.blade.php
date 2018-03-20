<section class="container-fluid">
  <aside class="row">
  <div id="amenu" class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
    <div id="first" class="menu-item row">
      <div class="col-12">
        <a href="/">
          <i class="fas fa-home"></i>
        </a>
      </div>
    </div>
    <div id="second" class="menu-item row">
        <a class="menu-collapse col-12" id="menu-collapse-first" data-toggle="collapse" href="#menu-user">
          <i class="far fa-user"></i>
        </a>
    </div>
    <div id="third" class="menu-item row">
      <a href="/jobs/" class="col-12">
        <i class="fas fa-suitcase"></i>
      </a>
    </div>
    <div id="fourth" class="menu-item row">
      <a class="menu-collapse col-12" data-toggle="collapse" href="#menu-start">
          <i class="far fa-building"></i>
      </a>
    </div>
    @if(Session::has('user'))
    <div id="fifth" class="menu-item row">
        <a href="/member/disconnect" class="col-12">
          <i class="fas fa-power-off"></i>
        </a>
    </div>
    @endif
  </div>
</aside>
<div class="row" id="Page">
  <div class="col-1"></div>
  <main class="col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 row" id="page_main">
@if(isset($error))
  {{$error}}
@endif
@if(isset($valid))
  {{$valid}}
@endif