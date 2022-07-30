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
        $('#reservationdate2').datetimepicker({
            setDate: new Date(),
            autoclose: true,
            format: 'DD/MM/YYYY'
        });
    });
</script>
@endpush
@section('title','Career') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{@$result ? 'Edit' : 'Tambah'}} Data Career</h3>
                        <div class="float-right">
                            <a href="{{url('admin/career/')}}" class="btn btn-primary btn-sm">Kembali</a>
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
                    <form action="{{@$result ? route('career.update', $result->id) : route('career.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{@$result ? method_field('PUT') : ''}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan Judul" name="title" value="{{old('title', @$result->title)}}" />
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    @php
                                        $start_date = @$result->start_date ? date('d/m/Y', strtotime(@$result->start_date)) : date('d/m/Y', strtotime(date('Y-m-d')));
                                    @endphp
                                    <input type="text" class="form-control datetimepicker-input @error('start_date') is-invalid @enderror" data-target="#reservationdate" name="start_date" value="{{old('date',@$start_date)}}"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    @php
                                        $end_date = @$result->end_date ? date('d/m/Y', strtotime(@$result->end_date)) : date('d/m/Y', strtotime(date('Y-m-d')));
                                    @endphp
                                    <input type="text" class="form-control datetimepicker-input @error('end_date') is-invalid @enderror" data-target="#reservationdate2" name="end_date" value="{{old('date',@$end_date)}}"/>
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ringkasan Pekerjaan</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" rows="6" placeholder="Tambah Ringkasan Pekerjaan" name="short_description">{{old('short_description', @$result->short_description)}}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Tambah Deskripri" name="description">{!!old('description', @$result->description)!!}</textarea> 
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thumbnail</label><br>
                                <img id="output_thm" src="{{asset('uploads/career/'.@$result->thumbnail)}}" style="height: 150px;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="exampleInputFile" name="thumbnail" accept="image/gif, image/jpeg, image/png" oninput="output_thm.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <p>Maximum Upload Size 2MB - Ukuran 370x282 PX</p>
                                @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar</label><br>
                                <img id="output_img" src="{{asset('uploads/career/'.@$result->image)}}" style="height: 150px;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile" name="image" accept="image/gif, image/jpeg, image/png" oninput="output_img.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <p>Maximum Upload Size 2MB - Ukuran 770x463 PX</p>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Banner</label><br>
                                <img id="output_banner" src="{{asset('uploads/career/'.@$result->banner)}}" style="height: 150px;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('banner') is-invalid @enderror" id="exampleInputFile" name="banner" accept="image/gif, image/jpeg, image/png" oninput="output_banner.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                <p>Maximum Upload Size 2MB - Ukuran 1894x413 PX</p>
                                @error('banner')
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
