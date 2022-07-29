@extends('admin.layouts.master') 
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
        $( document ).ready(function() {
            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
    });
</script>
@endpush
@section('title','Brand') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Testimoni</h3>
                        <div class="float-right">
                            <a href="{{url('admin/testimonial/')}}" class="btn btn-primary btn-sm">Kembali</a>
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
                    <form action="{{@$result ? route('testimonial.update', $result->id) : route('testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{@$result ? method_field('PUT') : ''}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama" name="name" value="{{old('name', @$result->name)}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" name="email" value="{{old('email', @$result->email)}}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Testimoni</label>
                                <textarea class="form-control @error('testimoni') is-invalid @enderror" rows="6" placeholder="Tambah Testimoni" name="testimoni">{{old('testimoni', @$result->testimoni)}}</textarea>
                                @error('testimoni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="1" @if(@$result->is_active == '1') selected @endif>Aktif</option>
                                    <option value="0" @if(@$result->is_active == '0') selected @endif>Tidak Aktif</option>
                                </select>
                                @error('is_active')
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
