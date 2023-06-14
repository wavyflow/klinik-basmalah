<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Klinik Basmalah</h1>
                                        <h2 class="h4 text-gray-900 mb-4">Pendaftaran Online Berhasil</h2>
                                        <p>Nomor antrian anda adalah <?=$nextNomor?></p>
                                    </div>
                                    <a href="<?=base_url('pendaftaran_online/pdf/'.$nextNomor)?>" class="btn btn-success mt-3"><i class="fas fa-fw fa-file"></i> Cetak PDF</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>