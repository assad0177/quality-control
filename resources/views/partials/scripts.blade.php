    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/modernizr.custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.easing.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/retina.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.stellar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollto.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.appear.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.superslides.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.vide.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/goalProgress.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.mixitup.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/progress-bar.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.flexslider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/contact-form.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/register-form.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <!-- Custom Script -->
    <script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr  id="addr'+(i+1)+'"></tr>');
            i++;
            });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
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
    </script>

    <script>
        $(document).ready(function(){
            $(document).on("change",".plan",function(){
                    var plan_id=$(this).val();
                    var that= $(this);
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
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

            $("#continue").click(function(){
            $("#wait").html("Please wait Your Request is being Processed...");
            });
    </script>
