@include("site.head")
@foreach($articles as $a)
    @php
        $date = str_replace(':', '-', $a->created_at);
        $date = str_replace(' ', '-', $date);
        $date = explode('-', $date);
        $url = str_replace('+', '-', urlencode($a->title));
    @endphp
    <div class="col-1"></div>
    <div class="col-10 article row">
        <h3 class="col-12">{{$a->title}}</h3>
        <a href="article/{{$url}}" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6" title="{{\App\Organizations::where('id', $a->org_id)->get()[0]->name}} - {{$a->title}}">
            <div class="img" style="background-image: url({{$a->image}})"></div>
        </a>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="col-12 row article-content">
                {{$a->description}}
            </div>
            <div class="row">
                <div class="hidden-xs-down hidden-sm-down hidden-md-down hidden-lg-down col-xl-12"></div>
                <div class="col-6"></div>
                <a class="col-6 content-link" href="article/{{$url}}" title="{{$a->button_title}}">{{$a->button}} <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
        <div class="hidden-xs-down hidden-sm-down hidden-md-down hidden-lg-down col-xl-6"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            @php
                $url = str_replace('+', '-', urlencode(\App\Organizations::where('id', $a->org_id)->get()[0]->name));
            @endphp
            <span><a href="/org/view/{{$url}}" title="{{\App\Organizations::where('id', $a->org_id)->get()[0]->name}}">{{\App\Organizations::where('id', $a->org_id)->get()[0]->name}}</a> - <i>le {{$date[2] . "/" . $date[1] . "/" . $date[0]}}</i><a href=""><i class="far fa-comments"></i> {{\App\Comments::where('art_id', $a->id)->count()}}</a> <a><i class="far fa-heart"></i> 0</a> </span>
        </div>
    </div>
    <div class="col-1"></div>
@endforeach
<style>

</style>
@include("site.footer")