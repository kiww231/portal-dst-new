<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recruitment DST</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('storage/attributes/'.\App\Models\Attributes::first()->favicon)}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/plugins/toastr/toastr.min.css">
    <style>
        star{
            color:red;
        }
    </style>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{url('/')}}" class="navbar-brand">
                    <img src="{{asset('storage/attributes/'.\App\Models\Attributes::first()->logo)}}" alt="Daya Sinergi" class="brand-image " style="opacity: .8">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Lowongan Pekerjaan {{$career->title}}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
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
                                <form action="{{url('send-recruitment')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Lengkap<star>*</star></label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Lengkap" name="name" value="{{old('name')}}" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Tempat Lahir<star>*</star></label>
                                                    <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" placeholder="Masukan Tempat Lahir" name="place_of_birth" value="{{old('place_of_birth')}}" />
                                                    @error('place_of_birth')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>No HP (WA)<star>*</star></label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukan No HP (WA)" name="phone" value="{{old('phone')}}" />
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Lamaran yang dipilih<star>*</star></label>
                                                    <input type="hidden" value="{{$career->id}}" name="career_id" />
                                                    <input type="text" class="form-control @error('career') is-invalid @enderror" value="{{$career->title}}" readonly />
                                                    @error('career')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin<star>*</star></label>
                                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="L" @if(old('gender' == 'L')) selected @endif>Laki-laki</option>
                                                        <option value="P" @if(old('gender' == 'p')) selected @endif>Perempuan</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Lahir<star>*</star></label>
                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input @error('date_of_birth') is-invalid @enderror" data-target="#reservationdate" name="date_of_birth" value="{{old('date_of_birth',date('d/m/Y'))}}"/>
                                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('date_of_birth')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email<star>*</star></label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" name="email" value="{{old('email')}}" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Alamat Lengkap<star>*</star></label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="6" placeholder="Tambah Deskripsi" name="address">{{old('address', @$result->address)}}</textarea>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Surat Lamaran<star>*</star></label><br>
                                                    File PDF Surat Lamaran di tujukan kepada HRD PT. Daya Sinergi Teknomandiri
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input @error('application_letter') is-invalid @enderror" id="exampleInputFile" name="application_letter" accept="application/pdf">
                                                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                    @error('application_letter')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Daftar Riwayat Hidup(CV)<star>*</star></label><br>
                                                    File PDF Daftar Riwayat Hidup (CV)
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input @error('cv') is-invalid @enderror" id="exampleInputFile" name="cv" accept="application/pdf">
                                                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                    @error('cv')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Lampiran 1<star>*</star></label><br>
                                                    File PDF pas foto 3x4 terbaru, KTP, Ijazah + Transkip Nilai terakhir dan SKCK
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input @error('attachment1') is-invalid @enderror" id="exampleInputFile" name="attachment1" accept="application/pdf">
                                                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                    @error('attachment1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Lampiran 2</label><br>
                                                    File PDF Sertifikat Penunjang bila ada
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input @error('attachment2') is-invalid @enderror" id="exampleInputFile" name="attachment2" accept="application/pdf">
                                                            <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                    @error('attachment2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            {!!\App\Models\Attributes::first()->copyright!!}
        </footer>
        </div>
    <script src="{{asset('assets/admin')}}/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/admin')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{asset('assets/admin')}}/plugins/toastr/toastr.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/admin')}}/dist/js/adminlte.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{asset('assets/admin')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function(){
            $('#reservationdate').datetimepicker({
                setDate: new Date(),
                autoclose: true,
                format: 'DD/MM/YYYY'
            });
            bsCustomFileInput.init();
            $( document ).ready(function() {
                var alert = $('#alert').val();
                if(alert == 1){
                    toastr.success($('#alert').attr("data-message"));
                }else if(alert == 2){
                    toastr.error($('#alert').attr("data-message"));
                }
            });
        })
    </script>
</body>
</html>
