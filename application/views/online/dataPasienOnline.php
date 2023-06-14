
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pendaftaran Klinik Basmalah</h1>
                    <?php
                    if (validation_errors()==true) {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    ?>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Antrian</th>
                                            <th>No RM</th>
                                            <th>Jenis Kunjungan</th>
                                            <th>Nama</th>
                                            <th>Jenis Pasien</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Status Keaktifan</th>
                                            <th>ID Poli</th>
                                            <th>ID Dokter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td>ID Pendaftaran</td>
                                            <td>No RM</td>
                                            <td>Jenis Kunjungan</td>
                                            <td>Nama</td>
                                            <td>Jenis Pasien</td>
                                            <td>Tanggal Pendaftaran</td>
                                            <td>Status Keaktifan</td>
                                            <td>ID Poli</td>
                                            <td>ID Dokter</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        foreach($pendaftaranOnline as $po){ 
                                            if($po->stats_pendaftar == "Aktif"){
                                                $status = "btn btn-success";
                                                $route = "edit_status_online";
                                            } else {
                                                $status = "btn btn-danger";
                                                $route = "edit_status_offline";
                                            }
                                        ?>
                                        <tr>
                                            <td><?=$po->antrian?></td>
                                            <td><?=$po->no_rm?></td>
                                            <td><?=$po->jenis_kunjungan?></td>
                                            <td><?=$po->nama_pasien?></td>
                                            <td><?=$po->jenis_pasien?></td>
                                            <td><?=$po->tgl_pendaftaran?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('pendaftaran_online/'.$route.'/'.$po->id_pendaftaran); ?>" class= "<?= $status ?>"><?= $po->stats_pendaftar ?></a>
                                            </td>
                                            <td><?=$po->nama_poli?></td>
                                            <td><?=$po->nama_dokter?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('pendaftaran_online/delete/'.$po->id_pendaftaran); ?>" class= "btn btn-danger">Hapus</a>
                                            </td>
                                            
                                        </tr>
                                        <!-- Delete Modal -->
                                        <!-- <div class="modal fade" id="deleteModal<?= $p->id_poli ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data Poliklinik</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Hapus Poliklinik <?=$p->nama_poli?>?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <a class="btn btn-success" href="<?=base_url('data_poli/hapus_poli/'.$p->id_poli)?>">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Edit modal -->
                                    <!-- <div class="modal fade" id="editModal<?= $p->id_poli ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit data Poliklinik <?=$p->nama_poli?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Edit data poliklinik <?=$p->nama_poli?>
                                                    <form action="<?=base_url('data_poli/edit_poli/')?>" method="POST" enctype="multipart/form-data">    
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_poli">Nama Poliklinik</label>
                                                            <input type="hidden" class="form-control form-control-user" value="<?=$p->id_poli?>" name="id_poli">

                                                                <input type="text" class="form-control form-control-user" id="nama_poli"
                                                                    placeholder="Nama Poliklinik" value="<?=$p->nama_poli?>" name="nama_poli">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-success" type="Submit">Simpan</button>
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                        <?php } ?> 
                                        <!-- <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Poliklinik</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?=base_url('data_poli/tambah_poli/')?>" method="POST" enctype="multipart/form-data">    
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_poli">Nama Poliklinik</label>
                                                                <input type="text" class="form-control form-control-user" id="nama_poli"
                                                                    placeholder="Nama Poliklinik" name="nama_poli">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-success" type="Submit">Tambah</button>
                                                        </div>
                                                            </div>
                                                        </div> -->
                                                    </form>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        
        

