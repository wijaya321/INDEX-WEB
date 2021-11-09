<!DOCTYPE html>
<html lang="en">

<head>
<title>MMPI 2 | FKUMS</title><meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/maruti-style.css" />
<link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
<style>
ul {
  padding: 0;
  margin: 0;
}

li { 
  padding-left: 16px; 
  padding-bottom: 10px;
}

li::before {
  padding-right: 8px;
  color: blue; /* Or a color you prefer */
}
</style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="./">MMPI 2 fkums</a></h1>
</div>
<!--close-Header-part--> 


<div id="content">
  <div class="container-fluid">
    <div class="widget-box">
    <div class="widget-title"> 
       <div class="widget-title"> 
        <h5>REGISTRASI MMPI 2</h5>
        <div class="buttons"><a href="hasil.php" class="btn btn-mini btn-success">LIHAT HASIL UJIAN</a></div>
      </div>
    </div>
    <div class="widget-content nopadding">
      <form action="#" method="post" class="form-horizontal">
        <div class="control-group">
          <label class="control-label">NO ID</label>
          <div class="controls">
            <input type="text" class="span11" name="id_peserta" placeholder="ID Peserta" style="text-transform:uppercase" required><br>
            <small>menggunakan No. KTP/ No. SIM/ Tanggal Lahir dengan Format '31122010'</small>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">NAMA</label>
          <div class="controls">
            <input type="text" class="span11" name="nama" placeholder="Nama Peserta" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">JENIS KELAMIN</label>
          <div class="controls">
            <label>
              <input type="radio" name="jk" value="M">
              LAKI-LAKI</label>
            <label>
              <input type="radio" name="jk" value="F">
              PEREMPUAN</label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">TEMPAT LAHIR</label>
          <div class="controls">
            <input type="text" class="span11" name="tempat_lahir" placeholder="Tempat Lahir" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">TANGGAL LAHIR</label>
          <div class="controls">
            <input type="text" id="datepicker" name="tgl_lahir" placeholder="Tanggal Lahir" class="span11" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">USIA</label>
          <div class="controls">
            <input type="text" class="span11" name="usia" placeholder="Usia" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">ALAMAT LENGKAP</label>
          <div class="controls">
            <input type="text" class="span11" name="alamat" placeholder="Alamat" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">KOTA/KABUPATEN</label>
          <div class="controls">
            <input type="text" class="span11" name="kota" placeholder="KOTA" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">STATUS PERKAWINAN</label>
          <div class="controls">
            <select name="kawin" required class="span11">
              <option value=""> - </option>
              <option value="BELUM KAWIN"> BELUM KAWIN </option>
              <option value="BELUM KAWIN"> SUDAH KAWIN </option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">PENDIDIKAN</label>
          <div class="controls">
            <select name="pendidikan" required class="span11">
              <option value=""> - </option>
              <option value="SLTP"> SLTP </option>
              <option value="SLTA"> SLTA </option>
              <option value="S1"> S1 </option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">NOMOR HP</label>
          <div class="controls">
            <input type="text" class="span11" name="no_hp" placeholder="NO HANDPHONE" style="text-transform:uppercase" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">JURUSAN YANG DI AMBIL</label>
          <div class="controls">
            <select name="jurusan" required class="span11">
              <option value=""> - </option>
              <option value="FK"> FAKULTAS KEDOKTERAN </option>
              <option value="FKG"> FAKULTAS KEDOKTERAN GIGI </option>
              <option value="UMUM"> UMUM </option>
            </select>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-success" name="reg">Registrasi</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"></div>
</div>


<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/maruti.js"></script> 
<script src="js/maruti.form_common.js"></script>
</body>
</html>

<?php
  include "config/koneksi.php";
  if (isset($_POST['reg'])) {
    $id_peserta = $_POST['id_peserta'];
    $nama = addslashes(strtoupper($_POST['nama']));
    $jk = $_POST['jk'];
    $tempat_lahir = addslashes(strtoupper($_POST['tempat_lahir']));
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = addslashes(strtoupper($_POST['alamat']));
    $usia = $_POST['usia'];
    $kota = addslashes(strtoupper($_POST['kota']));
    $kawin = $_POST['kawin'];
    $no_hp = $_POST['no_hp'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];

    $cari_id = mysqli_query($koneksi, "SELECT max(id_daftar_temp) FROM mmpi_daftar_temp") or die(mysqli_error());
    $data_id = mysqli_fetch_array($cari_id);
    if ($data_id) {
      $nilai_id = $data_id[0];
      $id_ = (int) $nilai_id;
      $id_ = $id_ + 1;
      $id_otomatis = $id_;
    }else{
      $id_otomatis = 1;
    }
  $save = mysqli_query($koneksi, "INSERT INTO mmpi_daftar_temp(id_daftar_temp, id_peserta, nama, jk, tempat_lahir, tgl_lahir, alamat, kota, umur, status_menikah, no_hp, jurusan, pendidikan) VALUES('$id_otomatis', '$id_peserta', '$nama', '$jk', '$tempat_lahir', '$tgl_lahir', '$alamat', '$kota', '$usia', '$kawin', '$no_hp', '$jurusan', '$pendidikan')");
  if ($save) {
    echo "<script>alert('Pendaftaran MMPI-2 Sukses, silakan menghubungi admin untuk mencetak kartu ujian')</script>";
    echo '<script language="javascript">document.location="index.php";</script>';
  }else{
    echo "<script>alert('ada kesalahan ketika input, mohon di ulangi')</script>";
    echo '<script language="javascript">document.location="index.php";</script>';
  }
  }
?>