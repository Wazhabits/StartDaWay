@include('site.head')
@include('site.menu')
<table>
    <tr>
        <td style="padding: 0 10px;">{{$organization->name}}</td>
        <td style="padding: 0 10px;">{{$organization->siren}}</td>
        <td style="padding: 0 10px;">{{$organization->website}}</td>
        <td style="padding: 0 10px;">{{$organization->ad_nbr . " " . $organization->ad_type . " " . $organization->ad_name . " " . $organization->ad_pc . " " . $organization->ad_city}}</td>
        <td style="padding: 0 10px;">Ref : {{$organization->unicode}}</td>
        <td style="padding: 0 10px;">{{$organization->email }}</td>
        <td style="padding: 0 10px;">{{$organization->phone}}</td>
    </tr>
</table>
@include('site.footer')