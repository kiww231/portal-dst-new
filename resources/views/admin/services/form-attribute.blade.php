@extends('admin.layouts.master') 
@push('js')
<!-- bs-custom-file-input -->
<script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
@endpush
@section('title','Attribute Services') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Data Attribute Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{url('admin/services-attribute', $result->id)}}" method="post" enctype="multipart/form-data">
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
                                        <label>Status Video</label>
                                        <select class="form-control @error('video_is_active') is-invalid @enderror" name="video_is_active">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1" @if(@$result->video_is_active == '1') selected @endif>Aktif</option>
                                            <option value="0" @if(@$result->video_is_active == '0') selected @endif>Tidak Aktif</option>
                                        </select>
                                        @error('video_is_active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Video</label>
                                        <input type="text" class="form-control @error('video_title') is-invalid @enderror" placeholder="Masukan video_title" name="video_title" value="{{old('video_title', @$result->video_title)}}" />
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
                                        <img id="output3" src="{{asset('storage/services/'.@$result->video_thumbnail)}}" style="height: 150px"/>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Help</label>
                                        <select class="form-control @error('help_is_active') is-invalid @enderror" name="help_is_active">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1" @if(@$result->help_is_active == '1') selected @endif>Aktif</option>
                                            <option value="0" @if(@$result->help_is_active == '0') selected @endif>Tidak Aktif</option>
                                        </select>
                                        @error('help_is_active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Help</label>
                                        <input type="text" class="form-control @error('help_title') is-invalid @enderror" placeholder="Masukan Judul Help" name="help_title" value="{{old('help_title', @$result->help_title)}}" />
                                        @error('help_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gambar Help</label><br>
                                        <img id="output1" src="{{asset('storage/services/'.@$result->help_image)}}" style="height: 150px"/>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('help_image') is-invalid @enderror" id="exampleInputFile" name="help_image" accept="image/gif, image/jpeg, image/png" oninput="output1.src=window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('help_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status Business</label>
                                        <select class="form-control @error('business_is_active') is-invalid @enderror" name="business_is_active">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1" @if(@$result->business_is_active == '1') selected @endif>Aktif</option>
                                            <option value="0" @if(@$result->business_is_active == '0') selected @endif>Tidak Aktif</option>
                                        </select>
                                        @error('business_is_active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tagline Business</label>
                                        <input type="text" class="form-control @error('business_tagline') is-invalid @enderror" placeholder="Masukan Tagline" name="business_tagline" value="{{old('business_tagline', @$result->business_tagline)}}" />
                                        @error('business_tagline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Business</label>
                                        <input type="text" class="form-control @error('business_title') is-invalid @enderror" placeholder="Masukan Judul business" name="business_title" value="{{old('business_title', @$result->business_title)}}" />
                                        @error('business_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Business</label>
                                        <textarea class="form-control @error('business_desc') is-invalid @enderror" rows="6" placeholder="Tambah Deskripsi" name="business_desc">{{old('business_desc', @$result->business_desc)}}</textarea>
                                        @error('business_desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Data Services Detail</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Benefits</label>
                                        <select class="form-control @error('benefits_is_active') is-invalid @enderror" name="benefits_is_active">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1" @if(@$result->benefits_is_active == '1') selected @endif>Aktif</option>
                                            <option value="0" @if(@$result->benefits_is_active == '0') selected @endif>Tidak Aktif</option>
                                        </select>
                                        @error('benefits_is_active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Benefits</label>
                                        <input type="text" class="form-control @error('benefits_title') is-invalid @enderror" placeholder="Masukan Judul Benefits" name="benefits_title" value="{{old('benefits_title', @$result->benefits_title)}}" />
                                        @error('benefits_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Benefits</label>
                                        <textarea class="form-control @error('benefits_desc') is-invalid @enderror" rows="8" placeholder="Tambah Deskripsi" name="benefits_desc">{{old('benefits_desc', @$result->benefits_desc)}}</textarea>
                                        @error('benefits_desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Gambar Benefits</label><br>
                                        <img id="output4" src="{{asset('storage/services/'.@$result->benefits_image)}}" style="height: 150px"/>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('benefits_image') is-invalid @enderror" id="exampleInputFile" name="benefits_image" accept="image/gif, image/jpeg, image/png" oninput="output4.src=window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('benefits_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status FAQ</label>
                                        <select class="form-control @error('faq_is_active') is-invalid @enderror" name="faq_is_active">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1" @if(@$result->faq_is_active == '1') selected @endif>Aktif</option>
                                            <option value="0" @if(@$result->faq_is_active == '0') selected @endif>Tidak Aktif</option>
                                        </select>
                                        @error('faq_is_active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
