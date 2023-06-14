



        

        


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Dokter Klinik Basmalah</h1>
                    <?php
                    if (validation_errors()==true) {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    ?>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Dokter</h6>
<button class="btn btn-success mt-3" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-fw fa-user-plus"></i> Tambah Dokter</button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Spesialis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Spesialis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($dokter as $d){ 
                                        ?>
                                        <tr>
                                            <td><?=$d->nip_dokter?></td>
                                            <td><?=$d->nama_dokter?></td>
                                            <td><?=$d->jenis_kelamin?></td>
                                            <td><?=$d->alamat?></td>
                                            <td><?=$d->no_telp?></td>
                                            <td><?=$d->spesialis?></td>
                                            <td class="text-center">
                                                <button class= "btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $d->id_dokter ?>"><i class="fas fa-trash"></i></button>
                                                <button class= "btn btn-warning" data-toggle="modal" data-target="#editModal<?= $d->id_dokter?>"><i class="fas fa-edit"></i></button>
                                            </td>
                                            
                                        </tr>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?= $d->id_dokter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data dokter</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Hapus dokter <?=$d->nama_dokter?>?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <a class="btn btn-success" href="<?=base_url('data_dokter/hapus_dokter/'.$d->id_dokter)?>">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit modal -->
                                    <div class="modal fade" id="editModal<?= $d->id_dokter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit data Dokter <?=$d->nama_dokter?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Edit data dokter <?=$d->nama_dokter?>
                                                    <form action="<?=base_url('data_dokter/edit_dokter/')?>" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col">
                                                            
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="NIP">NIP</label>
                                                            <input type="hidden" class="form-control form-control-user" value="<?=$d->id_dokter?>" name="id_dokter">

                                                                <input type="text" class="form-control form-control-user" id="NIP"
                                                                    placeholder="NIP" value="<?=$d->nip_dokter?>" name="NIP">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_dokter">Nama Lengkap</label>
                                                                <input type="text" class="form-control form-control-user" id="nama_dokter"
                                                                    placeholder="Nama Lengkap" value="<?=$d->nama_dokter?>" name="nama_dokter">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="JK">Jenis Kelamin</label>
                                                            <select class="custom-select" id="JK" name="JK">
                                                                <option selected value="<?=$d->jenis_kelamin?>">Pilih ...</option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control form-control-user" id="alamat"
                                                                    placeholder="Alamat" value="<?=$d->alamat?>" name="alamat">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_tlp">No. Telepon</label>
                                                                <input type="text" class="form-control form-control-user" id="no_tlp"
                                                                    placeholder="No. Telepon" value="<?=$d->no_telp?>" name="no_tlp">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="spesialis">Spesialis</label>
                                                                <input type="text" class="form-control form-control-user" id="spesialis"
                                                                    placeholder="Spesialis" value="<?=$d->spesialis?>" name="spesialis">
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?=base_url('data_dokter/tambah_dokter/')?>" method="POST" enctype="multipart/form-data">    
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nip_dokter">NIP Dokter</label>
                                                                <input type="text" class="form-control form-control-user" id="nip_dokter"
                                                                    placeholder="NIP" name="nip_dokter">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_dokter">Nama Lengkap</label>
                                                                <input type="text" class="form-control form-control-user" id="nama_dokter"
                                                                    placeholder="Nama Lengkap" name="nama_dokter">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="JK">Jenis Kelamin</label>
                                                            <select class="custom-select" id="JK" name="JK">
                                                                <option selected>Pilih ...</option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control form-control-user" id="alamat"
                                                                    placeholder="Alamat" name="alamat">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_telp">No Telepon</label>
                                                                <input type="text" class="form-control form-control-user" id="no_telp"
                                                                    placeholder="No Telepon" name="no_telp">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="spesialis">Spesialis</label>
                                                                <input type="text" class="form-control form-control-user" id="spesialis"
                                                                    placeholder="Spesialis" name="spesialis">
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
        
        

