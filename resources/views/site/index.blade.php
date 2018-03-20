@include("site.head")
@include("site.menu")
@foreach($articles as $a)
    @php
        $date = str_replace(':', '-', $a->created_at);
        $date = str_replace(' ', '-', $date);
        $date = explode('-', $date);
    @endphp
    <div class="col-1"></div>
    <div class="col-10 article row">
        <h3 class="col-12">{{$a->title}}</h3>
        <div class="col-4 img" style="background-image: url({{$a->image}})"></div>
        <div class="col-8">
            <div class="col-12 row article-content">
                {{$a->description}}
            </div>
            <div class="row">
                <div class="col-6"></div>
                @php
                    $url = str_replace('+', '-', urlencode($a->title));
                @endphp
                <a class="col-6 content-link" href="article/{{$url}}">{{$a->button}} <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
        <div class="col-9"></div>
        <div class="col-3">
            @php
                $url = str_replace('+', '-', urlencode(\App\Organizations::where('id', $a->org_id)->get()[0]->name));
            @endphp
            <span><a href="/org/view/{{$url}}">{{\App\Organizations::where('id', $a->org_id)->get()[0]->name}}</a> - <i>le {{$date[2] . "/" . $date[1] . "/" . $date[0]}}</i></span>
        </div>
    </div>
    <div class="col-1"></div>
@endforeach
<style>

</style>
@include("site.footer")