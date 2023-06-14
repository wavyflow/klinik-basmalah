    <div class="text-center">
        <h1 class="h2 text-gray-900 mb-4">Cetak Laporan</h1>
    </div>
    <div class="text-center">
        <h2 class="h4 text-gray-900 mb-4">Pilih Laporan</h2>
    </div>
    <div class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Export
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?=base_url('data_pasien/ekspor_pdf')?>">Data Pasien Baru</a>
                <a class="dropdown-item" href="<?=base_url('data_pasienlama/ekspor_pdf')?>">Data Pasien Lama</a>
                <a class="dropdown-item" href="data_dokter/ekspor_pdf">Data Dokter</a>
                <a class="dropdown-item" href="data_poli/ekspor_pdf">Data Poliklinik</a>
                <div class="dropdown-divider"></div>
                <button type="button" class="dropdown-item" onclick="tampilkanForm('buka')">Data Pendaftar</button>
                <!-- <a class="dropdown-item" href="pendaftaran_online/ekspor_pdf">Data Pendaftaran</a> -->
            </div>
        </div>

        <!-- *********Update From Us*********** -->

        <!-- <div class="text-center"> -->
        
        <div class="container">
        <center><br><br>
        <div id="pendaftar" style="display: none;" class="col-xl-4">
            <form action="pendaftaran_online/ekspor_pdf" method="post">
                <label>Export Data</label>
                <input type="text" class="form-control" name="typedatas" value="Data Pendaftar" disabled>
                <div class="form-control">
                <select class="js-example-basic-multiple mt-2 mb-2" name="tanggal">
                    <option value="">Semua</option>
                    <?php foreach($pendaftar->result_array()as $a):?>
                        <option value="<?= $a['tgl_pendaftaran']?>"><?= $a['tgl_pendaftaran']?></option>
                        <?php endforeach;?>
                </select>
                </div><br>
                <button type="button" class="btn btn-danger" onclick="tampilkanForm('tutup')">Close</button>
                <input type="submit" name="submit" class="btn btn-success" value="Export">
            </form>
        <!-- </div> -->
        </div>
        </center>
    </div>
    <!-- ******************************************* -->
    </div>