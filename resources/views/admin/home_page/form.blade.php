@extends('admin.layouts.master') 
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
        var trusted_display_data = '{{@$result->trusted_is_active}}';
        var improve_display_data = '{{@$result->improve_is_active}}';
        var cta_display_data = '{{@$result->cta_is_active}}';
        $( document ).ready(function() {
            $('#trusted_display').show();
            if(trusted_display_data === '1'){
                $('#trusted_display').show();
            }else{
                $('#trusted_display').hide();
            }
            
            $('#improve_display').show();
            if(improve_display_data === '1'){
                $('#improve_display').show();
            }else{
                $('#improve_display').hide();
            }
           
            $('#cta_display').show();
            if(cta_display_data === '1'){
                $('#cta_display').show();
            }else{
                $('#cta_display').hide();
            }

            var alert = $('#alert').val();
            if(alert == 1){
                toastr.success($('#alert').attr("data-message"));
            }else if(alert == 2){
                toastr.error($('#alert').attr("data-message"));
            }
        });
        
        $('input[name="trusted_is_active"]').on('switchChange.bootstrapSwitch', function (event, state){
            if (state == true){
                $('#trusted_display').show();
            }else{
                $('#trusted_display').hide();
            }
        });
        
        $('input[name="improve_is_active"]').on('switchChange.bootstrapSwitch', function (event, state){
            if (state == true){
                $('#improve_display').show();
            }else{
                $('#improve_display').hide();
            }
        });

        $('input[name="cta_is_active"]').on('switchChange.bootstrapSwitch', function (event, state){
            if (state == true){
                $('#cta_display').show();
            }else{
                $('#cta_display').hide();
            }
        });
    });
</script>
@endpush
@section('title','Home Page') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Data Home Page</h3>
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
                    <form action="{{route('home-page.update', @$result->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a href="{{url('admin/image-layer')}}" class="btn btn-primary btn-sm">Image Layer</a>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="brand_is_active" {{@$result->brand_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/brand')}}">Brand</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="feature_is_active" {{@$result->feature_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/services')}}">Feature</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="about_is_active" {{@$result->about_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/about')}}">About</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="services_is_active" {{@$result->services_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/services')}}">Services</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="project_is_active" {{@$result->project_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/project')}}">Project</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="testimonial_is_active" {{@$result->testimonial_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/testimonial')}}">Testimonial</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="news_is_active" {{@$result->news_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan <a href="{{url('admin/news')}}">News</a></label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="trusted_is_active" {{@$result->trusted_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Trusted</label>
                                    </div>
                                    <div id="trusted_display">
                                        <div class="form-group">
                                            <label>Judul Trusted</label>
                                            <input type="text" class="form-control @error('trusted_title') is-invalid @enderror" placeholder="Masukan Judul Trusted" name="trusted_title" value="{{old('trusted_title', @$result->trusted_title)}}" />
                                            @error('trusted_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Trusted</label>
                                            <input type="text" class="form-control @error('trusted_count') is-invalid @enderror" placeholder="Masukan Urutan" name="trusted_count" value="{{old('trusted_count', @$result->trusted_count)}}" />
                                            @error('trusted_count')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gambar Trusted</label><br>
                                            <img id="output_trusted" src="{{asset('uploads/home_page/'.@$result->trusted_image)}}" style="height: 50px;"/>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('trusted_image') is-invalid @enderror" id="exampleInputFile" name="trusted_image" accept="image/gif, image/jpeg, image/png" oninput="output_trusted.src=window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('trusted_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="improve_is_active" {{@$result->improve_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan Improve</label>
                                    </div>
                                    <div id="improve_display">
                                        <div class="form-group">
                                            <label>Jumlah Project Selesai</label>
                                            <input type="text" class="form-control @error('improve_project_complete') is-invalid @enderror" placeholder="Masukan Jumlah Project Selesai" name="improve_project_complete" value="{{old('improve_project_complete', @$result->improve_project_complete)}}" />
                                            @error('improve_project_complete')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tagline Improve</label>
                                            <input type="text" class="form-control @error('improve_tagline') is-invalid @enderror" placeholder="Masukan Tagline Improve" name="improve_tagline" value="{{old('improve_tagline', @$result->improve_tagline)}}" />
                                            @error('improve_tagline')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Improve</label>
                                            <input type="text" class="form-control @error('improve_title') is-invalid @enderror" placeholder="Masukan Judul Improve" name="improve_title" value="{{old('improve_title', @$result->improve_title)}}" />
                                            @error('improve_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Gambar Improve</label><br>
                                            <img id="output_improve" src="{{asset('uploads/home_page/'.@$result->improve_image)}}" style="height: 50px;"/>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('improve_image') is-invalid @enderror" id="exampleInputFile" name="improve_image" accept="image/gif, image/jpeg, image/png" oninput="output_improve.src=window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('improve_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Background Improve</label><br>
                                            <img id="output_improve2" src="{{asset('uploads/home_page/'.@$result->improve_background)}}" style="height: 50px;"/>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('improve_background') is-invalid @enderror" id="exampleInputFile" name="improve_background" accept="image/gif, image/jpeg, image/png" oninput="output_improve2.src=window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('improve_background')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" data-bootstrap-switch name="cta_is_active" {{@$result->cta_is_active == 1 ? 'checked' : ''}} value="1">
                                        <label>Tampilkan CTA</label>
                                    </div>
                                    <div id="cta_display">
                                        <div class="form-group">
                                            <label>Sub Judul CTA</label>
                                            <input type="text" class="form-control @error('cta_sub_title') is-invalid @enderror" placeholder="Masukan Sub Judul CTA" name="cta_sub_title" value="{{old('cta_sub_title', @$result->cta_sub_title)}}" />
                                            @error('cta_sub_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Judul CTA</label>
                                            <input type="text" class="form-control @error('cta_title') is-invalid @enderror" placeholder="Masukan Judul CTA" name="cta_title" value="{{old('cta_title', @$result->cta_title)}}" />
                                            @error('cta_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>CTA Url</label>
                                            <input type="text" class="form-control @error('cta_url') is-invalid @enderror" placeholder="Masukan url direct button" name="cta_url" value="{{old('cta_url', @$result->cta_url)}}" />
                                            @error('cta_url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Background CTA</label><br>
                                            <img id="output_cta" src="{{asset('uploads/home_page/'.@$result->cta_background)}}" style="height: 50px;"/>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('cta_background') is-invalid @enderror" id="exampleInputFile" name="cta_background" accept="image/gif, image/jpeg, image/png" oninput="output_cta.src=window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            @error('cta_background')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
