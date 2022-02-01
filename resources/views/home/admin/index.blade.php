@extends('home.master')
@section('konten')
    <h3><i class="fa fa-angle-right"></i> Data Administrator</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <div class="loc">
                    <p><a href="{{ route('dashboard') }}">Dashboard</a> <i class="fa fa-angle-right"></i> Data Administrator
                    </p>
                </div>
                @if ($messege = Session::get("pesan"))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-check-circle"></i>
                        <strong>Sukses!</strong> {{ Session::get("pesan") }}.
                    </div>
                @endif
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" class="display table table-bordered" id="hidden-table-info">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th width="100px">Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th width="150px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kelamin}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            Aktif
                                        @else
                                            Suspend
                                        @endif
                                    </td>
                                    @php
                                        $passcode = $item->id;
                                        $id = Crypt::encrypt($passcode);
                                    @endphp
                                    <td>
                                        <form action="{{ route('delete_admin', $id) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('edit_admin', $id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-pencil-square"></i></a>
                                            <button onclick="return confirm('Yakin ingin menghapus admin {{$item->nama}}')" type="submit" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{ asset('lib/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('lib/advanced-datatable/css/DT_bootstrap.css') }}" />
    <style>
        .loc{
            text-align: right;
            font-size: 15px
        }
    </style>
@endpush
@push('js')
    
    <script>
        $(document).ready(function() {
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [1]
                }],
                "aaSorting": [
                [1, 'asc']
                ]
            });
        }); 
    </script>
@endpush