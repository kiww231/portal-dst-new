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
        $("#example1") .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
        $( document ).ready(function() {
            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
        az = {
            delete: function(id){
                var base="{{url('admin/services')}}";
                var url = base.concat('/',id);
                var token = '{{ csrf_field() }}';
                Swal.fire({
                    title: 'Delete Data?',
                    text: "Data Services akan di delete.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya'
                }).then(function (result) {
                    if (result.value) {
                       $.ajax({
                            url: url,  
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: id,
                            },  
                            success: function (res) {
                                if(res == 'success'){
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'Data Services Berhasil di Delete.',
                                        icon: 'success',
                                    })
                                    window.location.href = "{{url('admin/services')}}/";
                                }else{
                                    swal({
                                        title: 'Error!',
                                        text: 'Data Services Gagal di Hapus.',
                                        icon: 'error',
                                    })
                                }
                            },
                            error: function (res) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Data Services Gagal di Hapus.',
                                    icon: 'error',
                                })
                            }
                        });
                    }
                })
            }
        }
    });
</script>
@endpush @section('title','Services') 
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <input type="hidden" id="alert" value="2" data-message="{{$error}}" />
    @endforeach
@endif
@if (Session::has('success'))
    <input type="hidden" id="alert" value="1" data-message="{{Session::get('success')}}" />
@elseif (Session::has('error'))
    <input type="hidden" id="alert" value="2" data-message="{{Session::get('error')}}" />
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data Services
                        </h3>
                        <div class="float-right">
                            <a href="{{url('admin/services/create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Ringkasan Deskripsi</th>
                                    <th class="text-center">View Help</th>
                                    <th class="text-center">View Feature</th>
                                    <th class="text-center">View Improve</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @foreach($data as $val)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$val->title}}</td>
                                    <td>{{$val->short_description}}</td>
                                    <td class="text-center">
                                        @if($val->is_help == 1)
                                            <sapn class="badge badge-success">Aktif</sapn>
                                        @else
                                            <sapn class="badge badge-danger">Tidak Aktif</sapn>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($val->is_feature == 1)
                                            <sapn class="badge badge-success">Aktif</sapn>
                                        @else
                                            <sapn class="badge badge-danger">Tidak Aktif</sapn>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($val->is_improve == 1)
                                            <sapn class="badge badge-success">Aktif</sapn>
                                        @else
                                            <sapn class="badge badge-danger">Tidak Aktif</sapn>
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
                                        <a href="{{url('admin/services/'.$val->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
                                        <a href="#" onclick="az.delete('{{$val->id}}')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
