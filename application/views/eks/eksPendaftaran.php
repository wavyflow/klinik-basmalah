<html><head>
<style>
h1,h2 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
table, th, td {
  border: 0;
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
    <tr>
        <td>ID Pendaftaran</td>
        <td>:</td>
        <td><?=$pendaftaran['id_pendaftaran']?></td>
    </tr>
    <tr>
        <td>No RM</td>
        <td>:</td>
        <td><?=$pendaftaran['no_rm']?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?=$pendaftaran['nama_pasien']?></td>
    </tr>
    <tr>
        <td>Tanggal Berobat</td>
        <td>:</td>
        <td><?= dateFormat('d-m-Y',$pendaftaran['tgl_pendaftaran']) ?></td>
    </tr>
    <tr>
        <td>No Antrian</td>
        <td>:</td>
        <td><?=$pendaftaran['antrian']?></td>
    </tr>
    <tr>
        <td>Poli Tujuan</td>
        <td>:</td>
        <td><?=$pendaftaran['nama_poli']?></td>
    </tr>
</table>
</body></html>