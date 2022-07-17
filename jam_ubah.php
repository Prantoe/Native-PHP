<?php
$row = $db->get_row("SELECT * FROM tb_jam WHERE id_jam='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Jam</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST">
            <div class="form-group">
                <label>Nama Jam <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nm_jam" value="<?= set_value('nm_jam', $row->nm_jam) ?>" />
            </div>
            <div class="form-group">
                <label>Mulai <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mulai" value="<?= set_value('mulai', $row->mulai) ?>" />
            </div>
            <div class="form-group">
                <label>Selesai <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="selesai" value="<?= set_value('selesai', $row->selesai) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=jam"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>