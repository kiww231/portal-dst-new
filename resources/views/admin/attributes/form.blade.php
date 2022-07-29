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
@section('title','Attributes') 
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Data Attributes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    <form action="{{route('attributes.update', @$result->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Copyright</label>
                                <textarea class="form-control @error('copyright') is-invalid @enderror" rows="4" placeholder="Tambah Copyright" name="copyright">{{old('copyright', @$result->copyright)}}</textarea>
                                @error('copyright')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Favicon</label><br>
                                <img id="output1" src="{{asset('storage/attributes/'.@$result->favicon)}}" style="height: 50px;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('favicon') is-invalid @enderror" id="exampleInputFile" name="favicon" accept="image/gif, image/jpeg, image/png" oninput="output1.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label><br>
                                <img id="output" src="{{asset('storage/attributes/'.@$result->logo)}}" style="height: 50px; max-width: 100%; overflow: hidden;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="exampleInputFile" name="logo" accept="image/gif, image/jpeg, image/png" oninput="output.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Putih</label><br>
                                <img id="output_wht" src="{{asset('storage/attributes/'.@$result->logo_white)}}" style="height: 50px; max-width: 100%; overflow: hidden;"/>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('logo_white') is-invalid @enderror" id="exampleInputFile" name="logo_white" accept="image/gif, image/jpeg, image/png" oninput="output_wht.src=window.URL.createObjectURL(this.files[0])">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('logo_white')
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
