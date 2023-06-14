



        

        


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Poliklinik Klinik Basmalah</h1>
                    <?php
                    if (validation_errors()==true) {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    ?>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Poliklinik</h6>
<button class="btn btn-success mt-3" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-fw fa-user-plus"></i> Tambah Poliklinik</button>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Poliklinik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Poliklinik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($poli as $p){ 
                                        ?>
                                        <tr>
                                            <td><?=$p->nama_poli?></td>
                                            <td class="text-center">
                                                <button class= "btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $p->id_poli ?>"><i class="fas fa-trash"> Hapus</i></button>
                                                <button class= "btn btn-warning" data-toggle="modal" data-target="#editModal<?= $p->id_poli?>"><i class="fas fa-edit"> Edit</i></button>
                                            </td>
                                            
                                        </tr>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?= $p->id_poli ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    </div>
                                    <!-- Edit modal -->
                                    <div class="modal fade" id="editModal<?= $p->id_poli ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    </div>
                                        <?php } ?>
                                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        </div>
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
        
        

