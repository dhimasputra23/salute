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

          <div class="title-bar">
            <h1 class="title-bar-title">
            <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_kejuruan/rekap_kuisioner/3/<?= $kejuruan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER C PER KEJURUAN : <?= $kejuruan1['nama_kejuruan']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden Pelaksanaan Uji Kompetensi</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/cetak_kejuruan_kuisioner_c_pelaksanaan/<?= $kejuruan; ?>" target="_blank" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url(); ?>laporan/export_kejuruan_excel_kuisioner_c_pelaksanaan/<?= $kejuruan; ?>" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15">No Responden</th>
                          <th colspan="<?= $jml_kuisioner_c_pelaksanaan;?>" class="text-center">Pelaksanaan Uji Kompetensi</th>
                          <th rowspan="3" align="center" ><center>ID Peserta</center></th>

                        </tr>

                        <tr>
                        <?php 
                               $soal=1;
                              foreach ($kuisioner_c_pelaksanaan as $key) { ?>
                                <th class="text-center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>

                      </thead>
                      <tbody>
                      <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                        <?php 
                            $kd_pelatihan = $pl['kd_pelatihan'];
                            $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_c WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>

                      <?php foreach($responden as $r){ ?>
                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg'")->result_array(); 
                          ?>
                          <tr>
                          <td class="text-center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 
                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalC']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND id_soalC='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg'")->row_array();  
                            // 
                          ?>
                          <td class="text-center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          
                          <?php if($soal != NULL){ ?>
                                <td class="text-center"><?= $nilainya['id_user']; ?></td>
                              <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                        <?php } ?>
                        <?php } ?>
                    
                        <tr>
                          <td>Jumlah</td>
                          <?php foreach($kuisioner_c_pelaksanaan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerC'];
                              $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= $total['total']; ?></td>
                          <?php } ?>
                        
                        </tr>

                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <?php foreach($kuisioner_c_pelaksanaan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerC'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= number_format($total['total'],2); ?></td>
                        <?php } ?>
                        </tr>

                        <tr>
                          <td>NRR X Bobot</td>
                          <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_c_pelaksanaan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerC'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= number_format($total['total']/$jml_kuisioner_c_pelaksanaan,2); ?></td>
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_c_pelaksanaan,2)); } ?>
                        
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml_kuisioner_c_pelaksanaan;?>" class="text-center"><h4><?= number_format($jmlh_keseluruhan,2) ;?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 25</td>
                          <td colspan="<?= $jml_kuisioner_c_pelaksanaan;?>" class="text-center"><h4><?= $hasil_akhir= number_format($jmlh_keseluruhan*25,2) ;?>
                          
                          <?php 
                              if($hasil_akhir <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($hasil_akhir>= 65.00 && $hasil_akhir<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($hasil_akhir>= 76.61 && $hasil_akhir<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($hasil_akhir>= 88.31 && $hasil_akhir<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>
                          
                          </h4></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                
                  </div>
                  <br>
            

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>