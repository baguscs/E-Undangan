@extends('home.master')
@section('konten')
    <h3><i class="fa fa-angle-right"></i> Tambah Administrator</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <div class="loc">
                    <p><a href="{{ route('dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i> Tambah Administrator
                    </p>
                </div>
                <form action="{{ route('post_admin') }}" method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama Administrator</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{old('nama')}}" name="nama" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" value="{{old('alamat')}}" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{old('email')}}" autocomplete="off" required class="form-control">
                            @error('email')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <b>Kesalahan!</b> {{ $message }}.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" name="telp" value="{{old('telp')}}" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" required name="kelamin">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" value="{{old('password')}}" required autocomplete="off" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Foto Administrator</label>
                        <div class="col-md-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="{{ asset('img/no-pict.png') }}" alt="" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <span class="btn btn-theme02 btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" id="inputFile" name="foto" required class="default" />
                                </span>
                              <button class="btn btn-theme04 fileupload-exists" id="clearFile" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</button>
                                @error('foto')
                                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <b>Kesalahan!</b> {{ $message }}.</div>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
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