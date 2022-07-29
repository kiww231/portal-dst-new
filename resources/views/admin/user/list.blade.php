@extends('admin.layouts.master') @push('css')
<!-- DataTables -->
<link rel="stylesheet"href="{{asset('assets/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"/>
<link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"/>

@endpush 
@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        az = {
            resetPass: function(id){
                var base="{{url('admin/password')}}";
                var url = base.concat('/reset/',id);
                Swal.fire({
                    title: 'Reset Password?',
                    text: "Password akan dikembalikan ke default 'rahasia'!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya'
                }).then(function (result) {
                    if (result.value) {
                       $.ajax({
                            url: url,    
                            success: function (res) {
                                if(res == 'success'){
                                    Swal.fire({
                                        title: 'Resseted!',
                                        text: 'Password Berhasil di Reset.',
                                        type: 'success',
                                        confirmButtonClass: "btn btn-success btn-fill",
                                        buttonsStyling: true
                                    })
                                    window.location.href = "{{url('admin/user')}}/";
                                }else{
                                    swal({
                                        title: 'Error!',
                                        text: 'Password Gagal di Reset.',
                                        type: 'error',
                                        confirmButtonClass: "btn btn-success btn-fill",
                                        buttonsStyling: true
                                    })
                                }
                            },
                            error: function (res) {
                                swal({
                                    title: 'Error!',
                                    text: 'Password Gagal di Reset.',
                                    type: 'error',
                                    confirmButtonClass: "btn btn-success btn-fill",
                                    buttonsStyling: true
                                })
                            }
                        });
                    }
                })
            }
        }
        $("#example1") .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });
</script>
@endpush @section('title','Users') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data User Pengguna
                        </h3>
                        <div class="float-right">
                            <a href="{{url('admin/user/create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Hak Akses</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @foreach($data as $val)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->email}}</td>
                                    <td class="text-center">
                                        @if($val->type == 1)
                                            Super Admin
                                        @else
                                            Admin
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($val->is_active == 1)
                                            <sapn class="badge badge-success">Aktif</sapn>
                                        @else
                                            <sapn class="badge badge-danger">Tidak Aktif</sapn>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/user/'.$val->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
                                        <a href="#" onclick="az.resetPass('{{$val->id}}')" class="btn btn-primary btn-xs" title="Reset Password"><i class="fa fa-lock"></i></a>
                                        <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
