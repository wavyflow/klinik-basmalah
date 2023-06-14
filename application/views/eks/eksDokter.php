<html><head>
<style>
h1,h2 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
table, th, td {
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px
}
</style>
<title>Daftar Dokter</title>
</head><body>
<h1>Data Dokter</h1>
<h2>Klinik Basmalah</h2>
<p>Jalan Nasional No. 3 Krajan, RT.02/RW.03, Krajan, Gendaran, Kec. Donorojo, Kabupaten Pacitan, Jawa Timur 63554</p>
<hr>
<table>
    <tr style="font-weight:bold">
        <td>NIP</td>
        <td>Nama</td>
        <td>Jenis Kelamin</td>
        <td>Alamat</td>
        <td>No. Telepon</td>
        <td>Spesialis</td>
    </tr>
<?php 
foreach($dokter as $d){ 
?>
    <tr>
        <td><?=$d->nip_dokter?></td>
        <td><?=$d->nama_dokter?></td>
        <td><?=$d->jenis_kelamin?></td>
        <td><?=$d->alamat?></td>
        <td><?=$d->no_telp?></td>
        <td><?=$d->spesialis?></td>
    </tr>
<?php } ?>
</table>
</body></html>