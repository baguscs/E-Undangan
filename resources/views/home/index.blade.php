@extends('home.master')
@section('konten')
    <div class="row mt">
        <a href="">
        <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
            <div class="darkblue-header">
                <h5>ADMINISTRATOR</h5>
            </div>
            <h1 class="mt"><i class="fa fa-desktop fa-3x"></i></h1>
            <p class="sum" data-count="120">0</p>
            </div>
            <!--  /darkblue panel -->
        </div>
        </a>
        <!-- /col-md-4 -->
        <a href="">
        <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
            <div class="darkblue-header">
                <h5>CUSTOMER</h5>
            </div>
            <h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
            <p class="sum" data-count="100">0</p>
            </div>
            <!--  /darkblue panel -->
        </div>
        </a>
        <!--  /col-md-4 -->
        <a href="">
        <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
            <div class="darkblue-header">
                <h5>PESANAN</h5>
            </div>
            <h1 class="mt"><i class="fa fa-envelope fa-3x"></i></h1>
            <p class="sum" data-count="111">0</p>
            </div>
            <!--  /darkblue panel -->
        </div>
        </a>
        <!-- /col-md-4 -->
        @if ($messege = Session::get("pesan"))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i>
                <strong>Sukses!</strong> {{ Session::get("pesan") }}.
            </div>
        @endif
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $('.sum').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({ countNum: $this.text()}).animate({
                countNum: countTo
            },
            {
                duration: 800,
                easing:'linear',
                step: function() {
                $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                $this.text(this.countNum);
                //alert('finished');
                }

            });  
        });
        
        $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Selamat Datang di MailTo!',
            // (string | mandatory) the text inside the notification
            text: 'Selamat bekerja dan semangat selalu.',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>
@endpush