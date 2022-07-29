@extends('admin.layouts.master') 
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('assets/admin')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
        var video_display_data = '{{@$result->video_is_active}}';
        $( document ).ready(function() {
            $('#video_display').show();
            if(video_display_data === '1'){
                $('#video_display').show();
            }else{
                $('#video_display').hide();
            }

            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
        
        $('input[name="video_is_active"]').on('switchChange.bootstrapSwitch', function (event, state){
            if (state == true){
                $('#video_display').show();
            }else{
                $('#video_display').hide();
            }
        });
    });
</script>
@endpush
@section('title','About') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Data About</h3>
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
                    <form action="{{route('about.update', $result->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Banner</label><br>
                                        <img id="output2" src="{{asset('storage/banner/'.@$result->banner)}}" style="height: 150px; width: 100%; overflow: hidden;"/>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('banner') is-invalid @enderror" id="exampleInputFile" name="banner" accept="image/gif, image/jpeg, image/png" oninput="output2.src=window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('banner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tagline</label>
                                        <input type="text" class="form-control @error('tagline') is-invalid @enderror" placeholder="Masukan tagline" name="tagline" value="{{old('tagline', @$result->tagline)}}" />
                                        @error('tagline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Masukan title" name="title" value="{{old('title', @$result->title)}}" />
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="6" placeholder="Tambah Description" name="description">{{old('description', @$result->description)}}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gambar</label><br>
                                        <img id="output" src="{{asset('storage/about/'.@$result->image)}}" style="height: 150px"/>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile" name="image" accept="image/gif, image/jpeg, image/png" oninput="output.src=window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gambar Kecil</label><br>
                                        <img id="output1" src="{{asset('storage/about/'.@$result->image_small)}}" style="height: 150px"/>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image_small') is-invalid @enderror" id="exampleInputFile" name="image_small" accept="image/gif, image/jpeg, image/png" oninput="output1.src=window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('image_small')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="brand_is_active" {{@$result->brand_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Brand</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="video_btn" data-bootstrap-switch name="video_is_active"  {{@$result->video_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Video</label>
                                    </div>
                                    <div id="video_display">
                                        <div class="form-group">
                                            <label>Judul Video</label>
                                            <input type="text" class="form-control @error('video_title') is-invalid @enderror" placeholder="Masukan Judul Video" name="video_title" value="{{old('video_title', @$result->video_title)}}" />
                                            @error('video_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Url Video</label>
                                            <textarea class="form-control @error('video_url') is-invalid @enderror" rows="4" placeholder="Tambah Url Video" name="video_url">{{old('video_url', @$result->video_url)}}</textarea>
                                            @error('video_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Thumbnail Video</label><br>
                                            <img id="output3" src="{{asset('storage/about/'.@$result->video_thumbnail)}}" style="height: 150px"/>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('video_thumbnail') is-invalid @enderror" id="exampleInputFile" name="video_thumbnail" accept="image/gif, image/jpeg, image/png" oninput="output3.src=window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('video_thumbnail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="testimonial_is_active" {{@$result->testimonial_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Testimonial</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="team_is_active" {{@$result->team_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Team</label>
                                    </div>
                                </div>
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
