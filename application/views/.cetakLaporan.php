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
                <a class="dropdown-item" href="pendaftaran_online/ekspor_pdf">Data Pendaftaran</a>
            </div>
        </div>
    </div>