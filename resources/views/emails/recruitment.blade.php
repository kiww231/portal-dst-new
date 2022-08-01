<!DOCTYPE html>
<html>
<head>
    <title>Lamaran Pekerjaan</title>
</head>
<body>
    <h4>Lamaran Pekerjaan</h4>
    Nama : {{$data->name}} <br>
    Tempat, Tanggal Lahir : {{$data->place_of_birth}}, {{$data->date_of_birth}} <br>
    Jenis Kelamin : {{$data->gender}} <br>
    No. Hp : {{$data->phone}} <br>
    Email : {{$data->email}} <br>
    Alamat : {{$data->address}}
</body>
</html>