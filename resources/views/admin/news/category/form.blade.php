@extends('admin.layouts.master') 
@push('css')
 <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/summernote/summernote-bs4.min.css">
@endpush
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- date-range-picker -->
<script>
    $(function () {
        $('#summernote').summernote({
            height: 300,
        });
        bsCustomFileInput.init();
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
        $( document ).ready(function() {
            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
        //Date picker
        $('#reservationdate').datetimepicker({
            setDate: new Date(),
            autoclose: true,
            format: 'DD/MM/YYYY'
        });
    });
</script>
@endpush
@section('title','Category News') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{@$result ? 'Edit' : 'Tambah'}} Data Category News</h3>
                        <div class="float-right">
                            <a href="{{url('admin/news/')}}" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
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
                    <form action="{{@$result ? route('news-category.update', $result->id) : route('news-category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{@$result ? method_field('PUT') : ''}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul<star>*</star></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan Judul" name="title" value="{{old('title', @$result->title)}}" />
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Ringakasan News" name="description" value="{{old('description', @$result->description)}}" />
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
