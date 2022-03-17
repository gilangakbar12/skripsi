<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}



#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #6495ED;
  color: white;
}
</style>
</head>
<body>

<h1><center>Data Mahasiswa Magang PT Kimia Farma Tbk</center></h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>NMM</th>
    <th>Nama</th>
    <th>Divisi</th>
    <th>Jenis Kelamin</th>
    <th>No Telpon</th>
    <th>Alamat</th>
    <th>Universitas</th>
  </tr>

  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
    <tr>
        <td><center>{{ $no++ }}</center></td>
        <td>{{ $row->nmm }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->divisi }}</td>
        <td>{{ $row->jenis_kelamin }}</td>
        <td>{{ $row->no_telpon }}</td>
        <td>{{ $row->alamat }}</td>
        <td>{{ $row->universitas }}</td>
    </tr>
  @endforeach

</table>

</body>
</html>


