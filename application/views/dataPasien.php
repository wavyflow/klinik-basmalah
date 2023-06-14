 <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?=$tittle?> Klinik Basmalah</h1>
                    <?php
                    if (validation_errors()==true) {
                        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                    }
                    ?>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success"><?=$tittle?></h6>
<button class="btn btn-success mt-3" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-fw fa-user-plus"></i> Tambah Pasien</button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No. RM</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Status</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Keluarga</th>
                                            <th>No. Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No. RM</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Status</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Keluarga</th>
                                            <th>No. Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $no = 1;
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
                                            <td class="text-center">
                                                <button class= "btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $u->no_rm ?>"><i class="fas fa-trash"></i></button>
                                                <button class= "btn btn-warning" data-toggle="modal" data-target="#editModal<?= $u->no_rm ?>"><i class="fas fa-edit"></i></button>
                                                <a class="btn btn-success" href="<?=base_url('data_pasien/pdf_pasien/'.$u->no_rm)?>">KIB</a>
                                            </td>
                                            
                                        </tr>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?= $u->no_rm ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data pasien</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Hapus pasien <?=$u->nama_pasien?>?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <?php if ( $u->jml_kunjungan <=1 ) : ?>
                                                        <a class="btn btn-success" href="<?=base_url('data_pasien/hapus_pasien/'.$u->no_rm)?>">Hapus</a>
                                                    <?php else : ?>
                                                        <a class="btn btn-success" href="<?=base_url('data_pasienlama/hapus_pasien/'.$u->no_rm)?>">Hapus</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit modal -->
                                    <div class="modal fade" id="editModal<?= $u->no_rm ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit data pasien <?=$u->nama_pasien?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Edit data pasien <?=$u->nama_pasien?>
                                                    <?php if ( $u->jml_kunjungan <=1 ) : ?>
                                                        <form action="<?=base_url('data_pasien/edit_pasien/')?>" method="POST" enctype="multipart/form-data">
                                                    <?php else : ?>
                                                        <form action="<?=base_url('Data_pasienLama/edit_pasien/')?>" method="POST" enctype="multipart/form-data">
                                                    <?php endif; ?>
                                                        <div class="row">
                                                            <div class="col">
                                                            
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="NIK">NIK</label>
                                                            <input type="hidden" class="form-control form-control-user" value="<?=$u->no_rm?>" name="no_rm">

                                                                <input type="text" class="form-control form-control-user" id="NIK"
                                                                    placeholder="NIK" value="<?=$u->no_identitas?>" name="NIK">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_pasien">Nama Lengkap</label>
                                                                <input type="text" class="form-control form-control-user" id="nama_pasien"
                                                                    placeholder="Nama Lengkap" value="<?=$u->nama_pasien?>" name="nama_pasien">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="JK">Jenis Kelamin</label>
                                                            <select class="custom-select" id="JK" name="JK">
                                                                <option selected value="<?=$u->jenis_kelamin?>">Pilih ...</option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                                                <input type="date" class="form-control form-control-user" id="tgl_lahir"
                                                                    placeholder="Tanggal Lahir" value="<?=$u->tgl_lahir?>" name="tgl_lahir">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="tpt_lahir">Tempat Lahir</label>
                                                                <input type="text" class="form-control form-control-user" id="tpt_lahir"
                                                                    placeholder="Tempat Lahir" value="<?=$u->tpt_lahir?>" name="tpt_lahir">
                                                            </div>
                                                        </div>
                                                            </div>
                                                            <div class="col">
                                                            <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="Status">Status</label>
                                                            <select class="custom-select" id="Status" name="Status">
                                                                <option selected value="<?=$u->status_pasien?>">Pilih ...</option>
                                                                <option value="Belum Kawin">Belum Kawin</option>
                                                                <option value="Kawin">Kawin</option>
                                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                                <option value="Cerai Mati">Cerai Mati</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="Agama">Agama</label>
                                                            <select class="custom-select" id="Agama" name="Agama">
                                                                <option selected value="<?=$u->agama?>">Pilih ...</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control form-control-user" id="alamat"
                                                                    placeholder="Alamat" value="<?=$u->alamat?>" name="alamat">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="pekerjaan">Pekerjaan</label>
                                                                <input type="text" class="form-control form-control-user" id="pekerjaan"
                                                                    placeholder="Pekerjaan" value="<?=$u->pekerjaan?>" name="pekerjaan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="keluarga">Keluarga</label>
                                                                <input type="text" class="form-control form-control-user" id="keluarga"
                                                                    placeholder="Keluarga" value="<?=$u->keluarga?>" name="keluarga">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_tlp">No. Telepon</label>
                                                                <input type="text" class="form-control form-control-user" id="no_tlp"
                                                                    placeholder="No. Telepon" value="<?=$u->no_tlp?>" name="no_tlp">
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?=base_url('data_pasien/tambah_pasien/')?>" method="POST" enctype="multipart/form-data">    
                                                        <div class="row">
                                                            <div class="col">
                                                            <!-- <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_rm">No RM</label>
                                                                <input type="text" class="form-control form-control-user" id="no_rm"
                                                                    placeholder="No RM" name="no_rm">
                                                            </div>
                                                        </div> -->
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_identitas">NIK</label>
                                                                <input type="text" class="form-control form-control-user" id="no_identitas"
                                                                    placeholder="NIK" name="no_identitas">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="nama_pasien">Nama lengkap</label>
                                                                <input type="text" class="form-control form-control-user" id="nama_pasien"
                                                                    placeholder="Nama lengkap" name="nama_pasien">
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
                                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                                                <input type="date" class="form-control form-control-user" id="tgl_lahir"
                                                                    placeholder="Tanggal Lahir" name="tgl_lahir">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="tpt_lahir">Tempat Lahir</label>
                                                                <input type="text" class="form-control form-control-user" id="tpt_lahir"
                                                                    placeholder="Tempat Lahir" name="tpt_lahir">
                                                            </div>
                                                        </div>
                                                            </div>
                                                            <div class="col">
                                                            <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="Status">Status</label>
                                                            <select class="custom-select" id="Status" name="Status">
                                                                <option selected>Pilih ...</option>
                                                                <option value="Belum Kawin">Belum Kawin</option>
                                                                <option value="Kawin">Kawin</option>
                                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                                <option value="Cerai Mati">Cerai Mati</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="Agama">Agama</label>
                                                            <select class="custom-select" id="Agama" name="Agama">
                                                                <option selected>Pilih ...</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                                <option value="Konghucu">Konghucu</option>
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
                                                            <label for="pekerjaan">Pekerjaan</label>
                                                                <input type="text" class="form-control form-control-user" id="pekerjaan"
                                                                    placeholder="Pekerjaan" name="pekerjaan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="keluarga">Keluarga</label>
                                                                <input type="text" class="form-control form-control-user" id="keluarga"
                                                                    placeholder="Keluarga" name="keluarga">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col mb-3 mb-sm-0">
                                                            <label for="no_tlp">No. Telepon</label>
                                                                <input type="text" class="form-control form-control-user" id="no_tlp"
                                                                    placeholder="No. Telepon" name="no_tlp">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-success" type="Submit">Tambah</button>
                                                        </div>
                                                            </div>
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
        
        

