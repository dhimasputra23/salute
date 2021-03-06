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
              <span class="d-ib">DATA USER</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalSignUpSm" type="button">(+) Tambah Data</button>
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
                  <strong>Daftar User</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['username']; ?></td>
                        <td><?= $i['email']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" href="#edit_data<?= $i['id_user']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#hapus_data<?= $i['id_user']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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
    <div id="modalSignUpSm" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data User</h4>
        </div>
        <div class="modal-body">
         <?php echo form_open('User/tambah_data');?>
            <div class="form-group">
                    <label for="username" class="form-control-label">Username *</label>
                    <input class="form-control" name="username" id="username" type="text" value="<?= set_value('username'); ?>" required>
                    <small class="form-text text-danger"><?= form_error('username');?></small>
            </div>

            <div class="form-group">
                <label for="password1" class="form-control-label">Password *</label>
                <input class="form-control" name="password1" id="password1" type="password" value="<?= set_value('password1'); ?>" required>
                <small class="form-text text-danger"><?= form_error('password1');?></small>
            </div>

            <div class="form-group">
                    <label for="password2" class="form-control-label">Retype Password *</label>
                    <input class="form-control" name="password2" id="password2" type="password" value="<?= set_value('password2'); ?>" required>
                    <small class="form-text text-danger"><?= form_error('password2');?></small>
            </div>

            <div class="form-group">
                <label for="email" class="form-control-label">Email *</label>
                <input class="form-control" name="email" id="email" type="email" value="<?= set_value('email'); ?>" required>
                <small class="form-text text-danger"><?= form_error('email');?></small>
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

<div id="edit_data<?= $x['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Ubah Data User</h4>
</div>
<div class="modal-body">
  <?php echo form_open('User/edit_data');?>
  <input type="hidden" readonly value="<?= $x['id_user']; ?>" name="id_user" class="form-control" >
    <div class="form-group">
      <label class="control-label">Email</label>
      <input class="form-control" type="text" name="email" value="<?= $x['email'] ?>" required>
      <small class="form-text text-danger"><?= form_error('email');?></small>
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

<div id="hapus_data<?= $x['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Hapus Data User</h4>
</div>
<div class="modal-body">
  <?php echo form_open('User/hapus_data');?>
  <input type="hidden" readonly value="<?= $x['id_user']; ?>" name="id_user" class="form-control" >
    <p>Apakah Anda Yakin Menghapus Data ?</strong>
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