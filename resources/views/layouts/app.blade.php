<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body style="background-color: rgba(0,0,0,.05)">
    @include('layouts.nav')
    @include('layouts.sidenav')
    <main class="content">
    {{-- TopBar --}}
    @include('layouts.topbar')
    @yield('content')
    {{-- Footer --}}
    @include('layouts.footer')
    </main>
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var table = $('.mydatatable').dataTable({
                scrollY:"400px",
                // fixedColumns:true,
                scrollX:true,
                // scrollCollapse: true,
                // sort:true,
                "pagingType": "simple_numbers",
                // fixedColumns:   {
                //     leftColumns:1,
                //     rightColumns:1,
                // }
            } );
        } );

        $(function () {
            $('.selectpicker').selectpicker();
        });
</script>


    <script>
        $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr  id="addr'+(i+1)+'"></tr>');
            i++;
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
            calc();
        });

        $('#tab_logic tbody').on('keyup change',function(){
            var price = $(this).find('.price').val();
            $(this).find('#grand_total').val(price);
            total=0;
            index=0;
            $('.price').each(function(key,value) {
                total += parseInt(  value[index]  );
            });
            $('#grand_total').val((total).toFixed(2));
        });
    });

    $(document).ready(function(){
                $(document).on("change",".plan",function(){
                    var plan_id=$(this).val();
                    var that= $(this);
                    $.ajaxSetup({
                        headers:{ 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"{{ route('getPlanPrice') }}",
                        method: 'GET',
                        data:{id:plan_id,   "_token": "{{ csrf_token() }}",    }
                    })
                    .done(function(data){
                        let elem = $(that).parent().parent().siblings('.plan_price');
                        $(elem).empty();
                        $(elem).append('<input type="number" name="price[]" placeholder="Unit Price"  class="form-control" step="0.00" min="0" readonly value="'+data.price+'"/>');
                        });
                    });
                });

    </script>
    <script>
        $("#sub").click(function(){
        $("#message").html('<span class="popuptext" id="myPopup"> Wait Your Request Is Being Processed...</span>').fadeIn(5000).fadeOut(5000);
    });

    </script>

</body>
</html>
