<html><head>
<style>
h1,h2 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px
}
</style>
<title>Cetak KIB</title>
</head><body>
<h1>Data Pasien</h1>
<h2>Klinik Basmalah</h2>
<p>Jalan Nasional No. 3 Krajan, RT.02/RW.03, Krajan, Gendaran, Kec. Donorojo, Kabupaten Pacitan, Jawa Timur 63554</p>
<hr>
<table>
    <tr style="font-weight:bold">
        <td>No. RM</td>
        <td>NIK</td>
        <td>Nama</td>
        <td>Jenis Kelamin</td>
        <td>Tanggal Lahir</td>
        <td>Tempat Lahir</td>
        <td>Status</td>
        <td>Agama</td>
        <td>Alamat</td>
        <td>Pekerjaan</td>
        <td>Keluarga</td>
        <td>No. Telepon</td>
    </tr>
<?php 
foreach($pasien as $u){ 
?>
    <tr>
        <td><?=$u->no_rm?></td>
        <td><?=$u->no_identitas?></td>
        <td><?=$u->nama_pasien?></td>
        <td><?=$u->jenis_kelamin?></td>
        <td><?= dateFormat('d-m-Y',$u->tgl_lahir) ?></td>
        <td><?=$u->tpt_lahir?></td>
        <td><?=$u->status_pasien?></td>
        <td><?=$u->agama?></td>
        <td><?=$u->alamat?></td>
        <td><?=$u->pekerjaan?></td>
        <td><?=$u->keluarga?></td>
        <td><?=$u->no_tlp?></td>
    </tr>
<?php } ?>
</table>
</body></html>