<div class="layout-content">
        <div class="layout-content-body">

        <?php 
                $dat = $this->session->flashdata('msg');
                    if($dat!=""){ ?>
                          <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
                <?php } ?> 
                <!-- Akhir flashdata  -->
      
            <?php 
            $dat = $this->session->flashdata('msg2');
                if($dat!=""){ ?>
                      <div id="notifikasi" class="alert alert-danger"><strong> </strong> <?=$dat;?></div>
        <?php } ?> 
            <br>


          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">DATA SUB SOAL</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_sub_soal" type="button">(+) Tambah Data</button>
          </div>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Daftar Sub Soal</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Nama Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama_sub_soal']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" href="#edit_data<?= $i['id_sub_soal']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#hapus_data<?= $i['id_sub_soal']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- MODAL BOX TAMBAH DATA -->
    <div id="add_sub_soal" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Sub Soal</h4>
        </div>
        <div class="modal-body">
         <?php echo form_open('Sub_soal/tambah_sub_soal');?>
            <div class="form-group">
              <label class="control-label">Nama Sub Soal</label>
              <input class="form-control" type="text" name="nama_sub_soal" required="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
          </form>
      </div>
    </div>
  </div>
    <!-- AKHIR MODAL BOX TAMBAH DATA -->

     <!-- MODAL BOX EDIT DATA -->
     <?php $no=0; foreach($data as $x): $no++; ?>

<div id="edit_data<?= $x['id_sub_soal']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Ubah Data Sub Soal</h4>
</div>
<div class="modal-body">
  <?php echo form_open('Sub_soal/edit_sub_soal');?>
  <input type="hidden" readonly value="<?= $x['id_sub_soal']; ?>" name="id_sub_soal" class="form-control" >
    <div class="form-group">
      <label class="control-label">Nama Sub Soal</label>
      <input class="form-control" type="text" name="nama_sub_soal" value="<?= $x['nama_sub_soal'] ?>" required>
      <small class="form-text text-danger"><?= form_error('nama_sub_soal');?></small>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary">Ubah</button>
</div>
  </form>
</div>
</div>
</div>
<?php endforeach;?>
<!-- AKHIR MODAL BOX EDIT DATA -->


<!-- MODAL BOX HAPUS DATA -->
<?php $no=0; foreach($data as $x): $no++; ?>

<div id="hapus_data<?= $x['id_sub_soal']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Hapus Data Sub Soal</h4>
</div>
<div class="modal-body">
  <?php echo form_open('Sub_soal/hapus_sub_soal');?>
  <input type="hidden" readonly value="<?= $x['id_sub_soal']; ?>" name="id_sub_soal" class="form-control" >
    <p>Apakah Anda Yakin Menghapus Data "<b><?= $x['nama_sub_soal']; ?></b>" ?</strong>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary">Hapus</button>
</div>
  </form>
</div>
</div>
</div>

<?php endforeach;?>
<!-- AKHIR MODAL BOX HAPUS DATA -->