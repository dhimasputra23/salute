<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALUTE | Cetak Laporan</title>
</head>
<style>
    p{
        font-family: "Times New Roman", Times, serif;
        font-size: 10px;
    }
</style>
<body onload="window.print()">
    <table align="center" cellspacing="5" width="100%">
            <tr>
                <td colspan="3"><h4>IV. BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA</h4></td>
            </tr>
            <tr>
                <td colspan="3"><center><h4>
                HASIL ANALISIS ANGKET <br>
                PER TAHAP <?= $tahap; ?>
                </h4></center></td>
            </tr>
            <tr>
                <td colspan="3">
                        <!-- tabel -->  
                        <table border="1" width="100%" cellspacing="0">
                        <tr  align="center" >
                          <th rowspan="2" width="15" align="center">No Responden</th>
                          <th colspan="<?= $jml_kuisioner_b_bahan_latihan;?>" align="center">Bahan Latihan</th>
                          <th rowspan="2" align="center" ><center>ID Peserta</center></th>
                        </tr>           
                        <tr>
                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_bahan_latihan as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>   
                      <tbody>
                      <?php $i1=1; foreach($pelatihan as $pl){ ?>
                        <?php 
                            $kd_pelatihan = $pl['kd_pelatihan'];
                            $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>

                      <?php foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 AND tipe_soal='pg' ")->result_array(); 
                          ?>
                         <tr>
                          <td align="center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 
                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalB']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 AND tipe_soal='pg'")->row_array();  
                            // 
                          ?>
                          <td align="center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <?php if($soal != NULL){ ?>
                            <td align="center"><?= $nilainya['id_user']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                          <?php } ?>
                      <?php } ?>
                        <tr>
                          <td align="center">Jumlah</td>
                          <?php foreach($kuisioner_b_bahan_latihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                          ?>
                            <td align="center"><?= $total['total']; ?></td>
                          <?php } ?>
                            <td rowspan="5"></td>
                        </tr>
                        <tr>
                          <td align="center">Nilai Rata-Rata</td>
                          <?php foreach($kuisioner_b_bahan_latihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total['total'],2); ?></td>
                        <?php } ?>
                        </tr>
                        <tr>
                          <td align="center">NRR X Bobot</td>
                          <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_b_bahan_latihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total['total']/$jml_kuisioner_b_bahan_latihan,2); ?></td>
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_b_bahan_latihan,2)); } ?>
                        </tr>
                        <tr>
                          <td align="center">Jumlah</td>
                          <td colspan="<?= $jml_kuisioner_b_bahan_latihan;?>" align="center"><h4><?= number_format($jmlh_keseluruhan,2) ;?></h4></td>
                        </tr>
                        <tr>
                          <td align="center">Jumlah X 20</td>
                          <td colspan="<?= $jml_kuisioner_b_bahan_latihan; ?>" align="center"><h4><?= $hasil_akhir = number_format($jmlh_keseluruhan*20,2);?> 
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
                        <!-- akhir tabel -->
                </td>
            </tr>
            
    </table> <div style="page-break-before:always;"></div>
    <center><h4>URAIAN</h4>
    <table border="1" width="100%" cellspacing=0>
            <th>No</th>
            <th width="40%">Soal</th>
            <th>Saran / Komentar</th>
            <th>ID Peserta</th>
      <tbody>
      <?php $no=1; foreach($pelatihan as $pl){
          $kd = $pl['kd_pelatihan']; 
          $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB WHERE kuisioner_b.jenis_soal=4 AND kuisioner_b.tipe_soal='uraian' AND penilaian_b.kd_pelatihan='$kd'")->result_array();
        
          foreach($tampung as $t){
        ?>
      
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $t['soalB']; ?></td>
            <td><?= $t['jawaban']; ?></td>
            <td align="center"><?= $t['id_user']; ?></td>
          </tr>
        <?php } } ?>
      </tbody>
    </table>
    </center>
</body>
</html>