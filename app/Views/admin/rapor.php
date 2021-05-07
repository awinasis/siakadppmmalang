 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1 style="color:MediumSeaGreen; font-family:timesnewrohman;">
             <?= $title; ?>
         </h1>
         <br><br>
         <ol class="breadcrumb">
             <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
             <li class="active">Data Rapor</li>
         </ol>
     </section>

     <div class="row">
         <div class="col-sm-12">
             <div class="box box-success box-solid">
                 <div class="box-header with-border">
                     <h3 class="box-title"><i class="fa  fa-table"></i> Data <?= $title; ?></h3>
                     <?php if (session()->get('level') == "Guru") { ?>
                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> Tambah</i></button>
                         </div>
                     <?php } ?>
                     <!-- /.box-tools -->
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        ?>

                     <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th width="50px" class="text-center">No</th>
                                     <th class="text-center">NIS</th>
                                     <th class="text-center">Nama Santri</th>
                                     <th class="text-center">L/P</th>
                                     <th width="150px" class="text-center">Data</th>
                                     <?php if (session()->get('level') == "Guru") { ?>
                                         <th width="150px" class="text-center">Action</th>
                                     <?php } ?>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $no = 1;
                                    foreach ($rapor as $key => $value) { ?>
                                     <tr>
                                         <td class="text-center"><?= $no++; ?></td>
                                         <td class="text-center"><?= $value['NIS'] ?></td>
                                         <td><?= $value['nama_santri'] ?></td>
                                         <td class="text-center"><?= $value['jenis_kelamin']; ?></td>
                                         <td class="text-center">
                                             <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail<?= $value['id_rapor'] ?>"><i class="fa fa-file-text"></i> Rapor</button>
                                         </td>
                                         <?php if (session()->get('level') == "Guru") { ?>
                                             <td class="text-center">
                                                 <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_rapor'] ?>"><i class="fa fa-edit"></i></button>
                                                 <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_rapor'] ?>"><i class="fa fa-trash"></i></button>
                                             </td>
                                         <?php } ?>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- /.box-body -->
             </div>
             <!-- /.box -->
         </div>
     </div>

     <?php if (session()->get('level') == "Guru") { ?>
         <!-- modal add -->
         <div class="modal fade" id="add">
             <div class="modal-dialog">
                 <div class="modal-content box box-success box-solid">
                     <div class="modal-header box-header with-border">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Tambah Rapor</h4>
                     </div>

                     <div class="modal-body">
                         <?php
                            echo form_open('data_rapor/add');
                            ?>

                         <div class="form-group row">
                             <div class="col-lg-6">
                                 <label>NIS</label>
                                 <input name="NIS" type="number" class="form-control" placeholder="NIS" required>
                             </div>
                         </div>

                         <div class="form-group">
                             <label>Nama Santri</label>
                             <input name="nama_santri" class="form-control" placeholder="nama_santri" required>
                         </div>

                         <div class="form-group row">
                             <div class="col-lg-8">
                                 <label class="form-control-label">Jenis Kelamin</label>
                                 <div class="form-group">
                                     <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" required> L
                                     <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" required> P
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
                     <?php echo form_close(); ?>
                 </div>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>

         <!-- modal edit -->
         <?php foreach ($rapor as $key => $value) { ?>
             <div class="modal fade" id="edit<?= $value['id_rapor'] ?>">
                 <div class="modal-dialog">
                     <div class="modal-content box box-success box-solid">
                         <div class="modal-header box-header with-border">
                             <h4 class="modal-title">Edit Rapor</h4>
                         </div>

                         <div class="modal-body">
                             <?php
                                echo form_open('data_rapor/edit/' . $value['id_rapor']);
                                ?>

                             <div class="form-group row">
                                 <div class="col-lg-6">
                                     <label>NIS</label>
                                     <input name="NIS" type="number" value="<?= $value['NIS'] ?>" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label>Nama Santri</label>
                                 <input name="nama_santri" value="<?= $value['nama_santri'] ?>" class="form-control">
                             </div>

                             <div class="form-group row">
                                 <div class="col-lg-8">
                                     <label class="form-control-label">Jenis Kelamin</label>
                                     <div class="form-group">
                                         <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" <?= $value['jenis_kelamin'] == "L" ? "checked" : ""; ?>> L
                                         <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" <?= $value['jenis_kelamin'] == "P" ? "checked" : ""; ?>> P
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                         <?php echo form_close(); ?>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>
         <?php } ?>

         <!-- modal delete -->
         <?php foreach ($rapor as $key => $value) { ?>
             <div class="modal fade" id="delete<?= $value['id_rapor'] ?>">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h4 class="modal-title">Delete Rapor</h4>
                         </div>

                         <div class="modal-body">
                             Apakah anda yakin ingin menghapus <b><?= $value['nama_santri'] ?> ?</b>
                         </div>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                             <a href="<?= base_url('data_rapor/delete/' . $value['id_rapor']) ?>" class="btn btn-primary">Delete</a>
                         </div>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>
         <?php } ?>
     <?php } ?>