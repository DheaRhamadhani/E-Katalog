<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/menu.php' ;
?>
<h1>Tambah/Ubah Buku</h1>

<h3>
    <?= validation_errors(); ?>
</h3>

<form method="post" enctype="multipart/form-data" action="<?= base_url('buku/save') ?>">
<input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>"/>
<input type="hidden" name="gambar_lama" value="<?= isset($gambar) ? $gambar : '' ?>"/>
<dl>
<div class="row mb-3">
    <label class="form-label">ISBN</label>
    <input  class="form-control" type="text" name="isbn" id="isbn" value="<?= $isbn ?>" required />
</div>

<div  class="row mb-3">
    <label class="form-label">Judul Buku</label>
    <input  class="form-control" type="text" name="judul" id="judul" value="<?= $judul ?>" required />
</div>

<div class="row mb-3">
    <label class="form-label">Pengarang</label>
    <input  class="form-control" type="text" name="pengarang" id="pengarang" value="<?= $pengarang ?>" required />
</div>

<div class="row mb-3">
    <label class="form-label">Sinopsis</label>
    <textarea  class="form-control" name="sinopsis" id="sinopsis"><?= $sinopsis ?></textarea>
</div>

<div class="row mb-3">
    <label class="form-label">Tanggal Rilis</label>
    <input  class="form-control" placeholder="dd-mm-yyyy" type="date" name="tanggal_rilis" id="tanggal_rilis" value="<?= $tanggal_rilis ?>" required />
</div>

<div class="row mb-3">
    <label class="form-label">Jumlah Halaman</label>
    <input  class="form-control" type="number" name="jumlah_halaman" id="jumlah_halaman" value="<?= $jumlah_halaman ?>" required />
</div>

<div>
    <label  class="form-label" >Tersedia</label>
    <div>
    <input type="radio" name="tersedia" id="tersedia" value="1" <?= $tersedia == '1' ? 'checked' : '' ?> />Tersedia
    <input type="radio" name="tersedia" id="tersedia" value="0" <?= $tersedia == '0' ? 'checked' : '' ?>/>Tidak tersedia
</div>
</div>

<div class="row mb-3">
    <label class="form-label">Penerbit</label>
    <select  class="form-control" name="id_penerbit" id="id_penerbit">
        <?php
         // $idx = row ke-x, $row => datanya
          foreach($penerbits as $idx => $row){
              ?>
              <option value="<?= $row['id'] ?>" 
              <?= $id_penerbit == $row['id'] ? 'selected' : '' ?>> 
              <?= $row['nama'] ?></option>
              <?php
          }
        ?>
    </select>
</div>

<div>
    <label class="form-label">Gambar</label>
    <input  class="form-control" type="file" name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)"/> <br>
    <img id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg'  : BASE_ASSETS . 'uploads/'.$gambar ?>" width="120"/>
</div>
        </dl>
<div>
<input class="btn btn-warning btn-sm" type="button" value="Cancel" onclick="history.back()" />
    <input class="btn btn-primary btn-sm" type="submit" value="Simpan" />
</div>

</form>

<script>
var loadFile = function(event) {
	var image = document.getElementById('preview');
	image.src = URL.createObjectURL(event.target.files[0]);
}

</script>