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
                <form action="{{ route('edited_customer', $id) }}" method="POST" class="form-horizontal style-form">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Customer</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$data->nama}}" name="nama" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" value="{{$data->alamat}}" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{$data->email}}" autocomplete="off" required class="form-control">
                            @error('email')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <b>Kesalahan!</b> {{ $message }}.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" name="telp" value="{{$data->no_telp}}" required autocomplete="off" class="form-control">
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
        #inputFile.on('click', function(){
            #clearFile.val('');
        });
    </script>
@endpush