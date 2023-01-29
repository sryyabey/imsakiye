@extends('layouts.frontend')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('İmsakiye Generator') }}</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <h1 class="text-center">Reklam alanı</h1>
                    </div>
                    <hr>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control select2" name="country" id="country" >
                                <option value=""> --- </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" name="city" id="city">
                                <option value=""> --- </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control select2" name="town" id="town">
                                <option value=""> --- </option>
                            </select>
                        </div>
                    </div>
<hr>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" id="tarih" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <input type="number" id="gun" max="31" class="form-control" placeholder="Day">
                        </div>
                    </div>

                    <hr>

                    <div class="row text-center">
                        <div class="col-md-3" >
                            <h4 id="townName"></h4>
                        </div>
                        <div class="col-md-3" >
                            <h4 id="cityName"></h4>
                        </div>
                        <div class="col-md-3" >
                            <h4 id="countryName"></h4>
                        </div>
                    </div>
                    <hr>

                    <div id="imsakiye" style="display:none">

                        <hr>
                        <table class="table table-striped" id="imsakiyeTable" >
                            <thead>
                            <tr>
                                <td>{{ trans('global.web.tarih') }}</td>
                                <td>{{ trans('global.web.imsak') }}</td>
                                <td>{{ trans('global.web.gunes') }}</td>
                                <td>{{ trans('global.web.ogle') }}</td>
                                <td>{{ trans('global.web.ikindi') }}</td>
                                <td>{{ trans('global.web.aksam') }}</td>
                                <td>{{ trans('global.web.yatsi') }}</td>
                            </tr>
                            </thead>
                            <tbody id=tableCl>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    $( document ).ready(function() {

$.ajax({
    type: "get",
    url: "https://namaz-vakti.vercel.app/api/countries",
    success: function (res) {
        $.each(res, function (index, val) {
             $('#country').append('<option value="'+val.name+'" selected="selected">'+val.name+'</option>');
        });
    }
});
});


$('#country').change(function(){
    var country = $(this).val();
    sessionStorage.setItem("country", country);
    $.ajax({
    type: "get",
    url: "https://namaz-vakti.vercel.app/api/regions?country="+country,
    success: function (res) {
        $.each(res, function (index,val) {
             $('#city').append('<option value="'+val+'" selected="selected">'+val+'</option>');
        });
    }
 });


 $('#city').change(function(){
    const city = $(this).val();
    sessionStorage.setItem("city", city);
    $.ajax({
        type: "get",
        url: "https://namaz-vakti.vercel.app/api/cities?country="+country+"&region="+city,
        success: function (res) {
            $.each(res, function (index,val) {
             $('#town').append('<option value="'+val+'" selected="selected">'+val+'</option>');
        });
        }
    });
 });


 $('#town').change(function(){



    var town = $(this).val();
    sessionStorage.setItem("town",town);



 });
});

$('#tarih').change(function(){
    var tarih = $(this).val();
    sessionStorage.setItem("tarih",tarih);
});

$('#gun').change(function(){
    $('#tableCl').empty();
    $('#imsakiye').show();

    const gun = $(this).val();
    const city = sessionStorage.getItem("city");
    const town = sessionStorage.getItem("town");
    const country = sessionStorage.getItem("country");
    const tarih = sessionStorage.getItem("tarih");

    console.log(gun,city,country,tarih);
    $.ajax({
        type: "get",
        url: "https://namaz-vakti.vercel.app/api/timesFromPlace?country="+country+"&region="+city+"&city="+town+"&date="+tarih+"&days="+gun+"&timezoneOffset=180",
        success: function (res) {
            const times = res.times;
            const place = res.place;
            console.log(place);
            $('#cityName').empty()
            $('#townName').empty()
            $('#countryName').empty()
            $('#cityName').append(place.region)
            $('#townName').append(place.city)
            $('#countryName').append(place.country)

            $.each(times,function(i,v){
                $('#tableCl').append('<tr><td>'+i+'</td><td>'+v[0]+'</td><td>'+v[1]+'</td><td>'+v[2]+'</td><td>'+v[3]+'</td><td>'+v[4]+'</td><td>'+v[5]+'</td></tr>');
            })

            $('#imsakiyeTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis','copy', 'csv', 'excel', 'pdf', 'print'
        ],
        aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    iDisplayLength: -1
    });


        }
    });


})



</script>
@endsection
