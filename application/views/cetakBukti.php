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
                                        <h2 class="h4 text-gray-900 mb-4">Pendaftaran Online</h2>
                                    </div>
                                    <?=$this->session->flashdata('message');?>
                                    <form class="user" method="post" action="<?=base_url('pendaftaran/cetakBukti');?>">
                                        <div class="form-group">
                                            <label for="JK">Jenis Kunjungan</label>
                                            <select class="custom-select" id="JK" name="JK">
                                                <option selected>Pilih ...</option>
                                                <option value="Umum">Umum</option>
                                                <option value="BPJS">BPJS</option>
                                            </select>
                                                <?=form_error('poli', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <div class="form-group">
                                            <label for="poli">Poliklinik</label>
                                            <input type="hidden" name="no_rm" value="<?=$no_rm?>">
                                            <select class="custom-select" id="poli" name="poli">
                                                <option selected>Pilih ...</option>
                                                <?php 
                                                $no = 1;
                                                foreach($poli as $p){ 
                                                ?>
                                                <option value="<?=$p->id_poli?>"><?=$p->nama_poli?></option>
                                                <?php } ?>
                                            </select>
                                                <?=form_error('poli', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <div class="form-group">
                                            <label for="dokter">Dokter</label>
                                            <select class="custom-select" id="dokter" name="dokter">
                                                <option selected>Pilih ...</option>
                                                <?php 
                                                $no = 1;
                                                foreach($dokter as $d){ 
                                                ?>
                                                <option value="<?=$d->id_dokter?>"><?=$d->nama_dokter?></option>
                                                <?php } ?>
                                            </select>
                                                <?=form_error('dokter', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Daftar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
                                                </div>