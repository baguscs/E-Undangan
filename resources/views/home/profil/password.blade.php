@extends('home.master')
@section('konten')
    <h3><i class="fa fa-angle-right"></i> Ganti Password</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <form class="form-horizontal style-form" action="{{ route('changes') }}" method="POST">
                    @csrf
                    <div class="loc">
                        <p><a href="{{ route('dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i> Ganti Password
                        </p>
                    </div>
                    @if ($messege = Session::get("pesan"))
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-exclamation-triangle"></i>
                            <strong>Peringatan!</strong> {{ Session::get("pesan") }}.
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password Lama</label>
                        <div class="col-sm-9">
                            <input type="password" id="old" name="old_password" required class="form-control">
                            <span class="input-group-btn add-on">
                              <button class="btn" type="button"><i class="fa fa-eye" onClick="showPwd('old', this)"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" id="passwd" name="password" required class="form-control">
                            <span class="input-group-btn add-on">
                              <button class="btn" type="button"><i class="fa fa-eye" onClick="showPwd('passwd', this)"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="confirm" name="password_confirmation" required class="form-control">
                            <span class="input-group-btn add-on">
                              <button class="btn" type="button"><i class="fa fa-eye" onClick="showPwd('confirm', this)"></i></button>
                            </span>
                            @error('password')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <b>Kesalahan!</b> Konfirmasi password anda salah.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" required> Saya memahami dan mengerti resiko yang terjadi
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-theme"><i class="fa fa-save"></i> Save</button>
                        <button type="button" class="btn btn-theme04"><i class="fa fa-times-circle"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .loc{
            text-align: right;
            font-size: 15px
        }
    </style>
@endpush
@push('js')
    <script>
        function showPwd(id, el) {
            let x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
                el.className = 'fa fa-eye-slash showpwd';
            } else {
                x.type = "password";
                el.className = 'fa fa-eye showpwd';
            }
        } 
    </script>
@endpush