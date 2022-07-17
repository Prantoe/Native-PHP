<?php
$row = $db->get_row("SELECT * FROM tb_admin WHERE id_admin='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Admin</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST">
            <div class="form-group">
                <label>Nama Admin <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nm_admin" value="<?= set_value('nm_admin', $row->nm_admin) ?>" />
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="<?= set_value('email', $row->email) ?>" />
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?= set_value('pass', $row->pass) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=admin"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>