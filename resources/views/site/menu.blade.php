 <form method="post" action="{{action("DataController@Search")}}" id="search">{{csrf_field()}}<label id="search_label" for="search_input"><i class="fas fa-search"></i></label><input id="search_input" type="text" name="search" placeholder="Rechercher ..."></form>
 @if(!Session::has('user'))
 @include("site.menu.logout")
 @else
 @include("site.menu.login")
 @endif
<!-- col-.col-xs-.col-sm.col-md-.col-lg-.col-xl --->