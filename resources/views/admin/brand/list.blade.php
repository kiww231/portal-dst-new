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

        az = {
            delete: function(id){
                var base="{{url('admin/brand')}}";
                var url = base.concat('/',id);
                var token = '{{ csrf_field() }}';
                Swal.fire({
                    title: 'Delete Data?',
                    text: "Data Brand akan di delete.",
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
                                        text: 'Data Brand Berhasil di Delete.',
                                        icon: 'success',
                                    })
                                    window.location.href = "{{url('admin/brand')}}/";
                                }else{
                                    swal({
                                        title: 'Error!',
                                        text: 'Data Brand Gagal di Hapus.',
                                        icon: 'error',
                                    })
                                }
                            },
                            error: function (res) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Data Brand Gagal di Hapus.',
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
@endpush @section('title','Brand') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data Brand
                        </h3>
                        <div class="float-right">
                            <a href="{{url('admin/brand/create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no=1)
                                @foreach($data as $val)
                                <tr>
                                    <td class="text-center" style="width: 5px;">{{$no++}}</td>
                                    <td>{{$val->title}}</td>
                                    <td class="text-center"><img src="{{asset('uploads/brand/'.$val->image)}}" alt="" style="width:100px;"></td>
                                    <td class="text-center">
                                        @if($val->is_active == 1)
                                            <sapn class="badge badge-success">Aktif</sapn>
                                        @else
                                            <sapn class="badge badge-danger">Tidak Aktif</sapn>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/brand/'.$val->id.'/edit')}}" class="btn btn-primary btn-xs"><i class="fa fa-pen"></i></a>
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
