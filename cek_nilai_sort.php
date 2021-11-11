<div class="container-fluid" id="container-wrapper">
    <?php
    if (isset($_POST['cari'])) {
        $idrs = $_POST['id_rs'];
        $idst = $_POST['id_stase'];
        $s = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dt_stase WHERE id_stase = '$idst'"));
        $r = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dt_rs WHERE id_rs = '$idrs'"));
        ?>
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary" style="text-transform:uppercase"><?php echo "$s[nama_stase]<br>$r[nama_rs]"; ?></h4>
      </div>
      <div class="card-body">                  
        <table class="table table-bordered" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>TANGGAL AWAL STASE</th>
                <th>TANGGAL AKHIR STASE</th>
                <th>LIHAT</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                    $no = 1;
                    $q_mm = mysqli_query($koneksi, "SELECT * FROM mm_memo WHERE id_rs = '$idrs' AND id_stase = '$idst' ORDER BY id_memo DESC");
                    while ($d_mm = mysqli_fetch_array($q_mm)){
                      echo "<tr>";
                      echo "<td>$no</td>";
                      echo "<td>$d_mm[tgl_awal_stase]</td>";
                      echo "<td>$d_mm[tgl_akhir_stase]</td>"; ?>
                      <td>
                        <form action="" method="post" target="_BLANK">
                          <input type="hidden" name="id_mm" value="<?php echo "$d_mm[id_memo]"; ?>">
                          <button class="m-0 float-right btn btn-danger btn-sm" type="submit" name="cek">CEK</button>
                        </form>
                      </td>
                      </tr>
                      <?php
                      $no++;
                    }
                ?>
            </tbody>
          </table>
      </div>
    </div>
    </div>
  <?php 
  }elseif (isset($_POST['cek'])) {
        $idmemo = $_POST['id_mm'];
        $mm = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mm_memo WHERE id_memo = '$idmemo'"));
        $s = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dt_stase WHERE id_stase = '$mm[id_stase]'"));
        $r = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dt_rs WHERE id_rs = '$mm[id_rs]'"));
        ?>
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary" style="text-transform:uppercase"><?php echo "$s[nama_stase]<br>$r[nama_rs]<br>$mm[tgl_awal_stase] - $mm[tgl_akhir_stase]"; ?></h4>
      </div>
      <div class="card-body">                  
        <table class="table table-bordered" style="font-size: 8pt;">
            <thead class="thead-light">
              <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <?php 
                    $q_ujian = mysqli_query($koneksi, "SELECT * FROM ipt_ujian WHERE kd_stase = '$s[kd_stase]'");
                    while ($d_ujian = mysqli_fetch_array($q_ujian)){
                      echo "<th>$d_ujian[alias_ujian]</th>";
                    }
                ?>
              </tr>
            </thead>
            <tbody>
                <?php
                    $q_memo = mysqli_query($koneksi, "SELECT * FROM mm_det_memo WHERE id_memo = '$idmemo'");
                    while ($d_memo = mysqli_fetch_array($q_memo)) {
                        $nama_koas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dt_koas WHERE nim = '$d_memo[nim]'"));
                ?>
              <tr>
                <td><?php echo "$d_memo[nim]"; ?></td>
                <td><?php echo "$nama_koas[nama]"; ?></td>
                <?php
                  $q_ujian_2 = mysqli_query($koneksi, "SELECT * FROM ipt_ujian WHERE kd_stase = '$s[kd_stase]'");
                  while ($d_ujian_2=mysqli_fetch_array($q_ujian_2)){
                    $q_nilai_2 = mysqli_query($koneksi, "SELECT * FROM ipt_nilai WHERE nim='$d_memo[nim]' AND id_ujian='$d_ujian_2[id_ujian]' AND id_stase = '$mm[id_stase]'");
                    //$sql_ewmp_2 = mysqli_query($koneksi, "SELECT * FROM t_ewmp WHERE id_user='$dpetugas[id_user]' AND id_pekan='$data_pekan_2[id_pekan]'");
                    $d_nilai_2 = mysqli_fetch_array($q_nilai_2);
                      if (empty($d_nilai_2)) {
                        echo "<td><center> - </center></td>";
                      }else{                     
                          echo "<td align='right'><center>$d_nilai_2[nilai]</center></td>";
                      }
                }
                ?>
              </tr>
          <?php } ?>
            </tbody>
          </table>
      </div>
      <div class="card-footer text-center">
        <form action="export/export_nilai.php" method="post" target="_BLANK">
          <input type="hidden" name="idmemo" value="<?php echo "$idmemo"; ?>">
          <button class="m-0 float-right btn btn-danger btn-sm" type="submit" name="export">Download Excel</button>
        </form>
      </div>
    </div>
    </div>
  <?php }else{ ?>
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">CEK NILAI</h6>
      </div>
      <div class="card-body">  
      <form action="" method="post">                
        <div class="form-group">
          <label for="select2Multiple">RS</label>
          <select class="select2 form-control" name="id_rs" required>
            <option value=""></option>
            <?php 
                $q_rs = mysqli_query($koneksi, "SELECT * FROM dt_rs");
                while ($d_rs = mysqli_fetch_array($q_rs)) {
                    echo "<option value=$d_rs[id_rs]>$d_rs[nama_rs]</option>";
                }
            ?>
          </select>
        </div><div class="form-group">
          <label for="select2Multiple">STASE</label>
          <select class="select2 form-control" name="id_stase" required>
            <option value=""></option>
            <?php 
                $q_st = mysqli_query($koneksi, "SELECT * FROM dt_stase");
                while ($d_st = mysqli_fetch_array($q_st)) {
                    echo "<option value=$d_st[id_stase]>$d_st[nama_stase]</option>";
                }
            ?>
          </select>
        </div>
        <button type="submit" name="cari" class="btn btn-primary">CARI</button>
    </form>
      </div>
    </div>
  </div>
<?php } ?>
</div>