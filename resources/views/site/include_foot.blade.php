<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<script src="/js/classie.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        console.log("Work");
        $("a.menu-collapse").click(function( e ) {
            e.preventDefault();
            $($(this).attr('href')).collapse();
            console.log("#"+this.id+">svg");
            $("#"+this.id+">svg").toggleClass("rotated");
            console.log(this);
        });
    });
</script>