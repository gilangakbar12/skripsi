<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Mahasiswa</title>
  </head>
  <body>
    <h1 class="text-center mb-5">Data Mahasiswa</h1>

    <div class="container">
        <a href="/tambahdata" class="btn btn-success mb-3">Tambah Data</a>
            <div class="row g-3 align-items-center mt-1">
                <div class="col-auto">
                    <form action="/mahasiswa" method="get">
                        <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                    </form>
                </div>
                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-primary">Export PDF</a>
                </div>
            </div>
        <div class="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{ $message }}
                </div>
            @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">NMM</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Foto</th>
                    <th scope="col" class="text-center">Divisi</th>
                    <th scope="col" class="text-center">Jenis Kelamin</th>
                    <th scope="col" class="text-center">No.Telpon</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Universitas</th>
                    <th scope="col" class="text-center">Opsi</th>
                  </tr>
                </thead>
                <tbody>

                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row" class="text-center">{{ $no++ }}</th>
                        <td>{{ $row->nmm }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>
                            <img src="{{ asset('fotomahasiswa/'.$row->foto) }}" alt="" style="width: 50px;">
                          </td>
                        <td>{{ $row->divisi }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->no_telpon }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->universitas }}</td>
                        <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>

  <script>

    $('.delete').click( function(){
        var mahasiswaid = $(this).attr('data-id');
        var mahasiswanama = $(this).attr('data-nama');
            swal({
            title: "Apakah Kamu Yakin?",
            text: "Kamu akan menghapus data mahasiswa dengan nama "+mahasiswanama+"! ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location = "/deletedata/"+mahasiswaid+""
              swal("Sukses!", "Data Mahasiswa Berhasil Dihapus!", {
                icon: "success",
              });
            } else {
              swal("Batal!", "Data Mahasiswa Tidak Jadi Terhapus!");
            }
          });
    });

  </script>

  <script>

    @if (Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @endif

</script>
</html>
