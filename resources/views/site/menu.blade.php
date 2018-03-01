
<form action="{{action("DataController@Search")}}"  method="post">
    {{csrf_field()}}
    <input type="text" name="search" id="" minlength="5">
</form>