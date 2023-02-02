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
                'colvis','copyHtml5', 'csv', 'excelHtml5', 'pdfHtml5', 'print'
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


