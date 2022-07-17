<?php
$row = $db->get_row("SELECT * FROM tb_kart WHERE id_kart='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Kart</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST">
            <div class="form-group">
                <label>Nama Kart <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nm_kart" value="<?= set_value('nm_kart', $row->nm_kart) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kart"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>