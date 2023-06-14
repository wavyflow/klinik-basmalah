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
<title>Data Pendaftar</title>
</head><body>
<h1>Data Pendaftar</h1>
<h2>Klinik Basmalah</h2>
<p>Jalan Nasional No. 3 Krajan, RT.02/RW.03, Krajan, Gendaran, Kec. Donorojo, Kabupaten Pacitan, Jawa Timur 63554</p>
<hr>
<table>
    <tr style="font-weight:bold">
        <td>No Antrian</td>
        <td>No RM</td>
        <td>Jenis Kunjungan</td>
        <td>Nama</td>
        <td>Jenis Pasien</td>
        <td>Tanggal Pendaftaran</td>
        <td>Poliklinik</td>
        <td>Dokter</td>
    </tr>
<?php 
foreach($pendaftaran as $d){ 
?>
    <tr>
        <td><?=$d->antrian?></td>
        <td><?=$d->no_rm?></td>
        <td><?=$d->jenis_kunjungan?></td>
        <td><?=$d->nama_pasien?></td>
        <td><?=$d->jenis_pasien?></td>
        <td><?=$d->tgl_pendaftaran?></td>
        <td><?=$d->nama_poli?></td>
        <td><?=$d->nama_dokter?></td>
    </tr>
<?php } ?>
</table>
</body></html>