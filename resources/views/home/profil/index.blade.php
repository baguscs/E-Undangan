@extends('home.master')
@section('konten')
    <h3><i class="fa fa-angle-right"></i> Profil Utama</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="row content-panel">
                <div class="col-md-3 centered">
                    <div class="profile-pic">
                      <p><img src="{{ asset('img/users.jpg') }}" class="img-circle"></p>
                      <h3 class="nameTag">{{Auth::user()->admin->nama}}</h3>
                      <h5>{{Auth::user()->admin->role->role}}</h5>
                    </div>
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-9 profile-text">
                    <div class="loc">
                        <p><a href="{{ route('dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i> Profil Utama
                        </p>
                    </div>
                    <label for="">Alamat</label>
                    <input type="text" name="" value="{{Auth::user()->admin->alamat}}" readonly class="form-control" id="">
                    <label for="">No. Telpon</label>
                    <input type="text" name="" value="{{Auth::user()->admin->no_telp}}" readonly class="form-control" id="">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" name="" value="{{Auth::user()->admin->kelamin}}" readonly class="form-control" id="">
                    <label for="">Email</label>
                    <input type="text" name="" value="{{Auth::user()->admin->email}}" readonly class="form-control" id="">
                </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        label{
            margin-top:10px;
        }
        input{
            margin-bottom: 10px;
        }
        .nameTag{
            color: #3ca5e2;
            font-weight: bold;
        }
        .loc{
            text-align: right;
            font-size: 15px
        }
    </style>
@endpush