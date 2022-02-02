@extends('home.master')
@section('konten')
    <h3><i class="fa fa-angle-right"></i> Edit Customer</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <div class="loc">
                    <p><a href="{{ route('dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i> Edit Customer
                    </p>
                </div>
                @php
                    $passcode = $data->id;
                    $id = Crypt::encrypt($passcode);
                @endphp
                <form action="{{ route('edited_category', $id) }}" method="POST" class="form-horizontal style-form">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" name="kategori" value="{{$data->kategori}}" autocomplete="off" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" id="harga" value="{{number_format($data->harga,0,',','.')}}" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" required> Saya memahami dan mengerti resiko yang terjadi
                            </label>
                        </div>
                        <div class="col-xs-12 margin">
                            <button type="submit" class="btn btn-theme"><i class="fa fa-save"></i> Save</button>
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-theme04"><i class="fa fa-times-circle"></i> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <style>
        .loc{
            text-align: right;
            font-size: 15px
        }
        .margin{
            margin-top: 15px;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script>
        var harga = document.getElementById('harga');
        harga.addEventListener('keyup', function(e){
            harga.value = formatHpp(this.value, '');
        });


        function formatHpp(input, hasil){
            var number_string = input.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            harga     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            if(ribuan){
                separator = sisa ? '.' : '';
                harga += separator + ribuan.join('.');
            }

            harga = split[1] != undefined ? harga + ',' + split[1] : harga;
            return hasil == undefined ? harga : (harga ? '' + harga : '');
        }
    </script>
@endpush