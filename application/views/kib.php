<html><head>
<style>
h1,h2 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
</style>
<title>Cetak KIB</title>
</head><body>
<h1>KIB</h1>
<h2>Klinik Basmalah</h2>
<p>Jalan Nasional No. 3 Krajan, RT.02/RW.03, Krajan, Gendaran, Kec. Donorojo, Kabupaten Pacitan, Jawa Timur 63554</p>
<hr>
<table style="width:250px">
<?php 
$no = 1;
foreach($pasien as $u){ 
?>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?=$u->nama_pasien?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?=$u->alamat?></td>
    </tr>
    <tr>
        <td>No. RM</td>
        <td>:</td>
        <td><?=$u->no_rm?></td>
    </tr>
<?php } ?>
</table>
</body></html>