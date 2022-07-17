<?php
$row = $db->get_row("SELECT * FROM tb_transaksi WHERE id_transaksi='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Transaksi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="POST">
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?= set_value('tanggal', $row->tanggal) ?>" />
            </div>
            <div class="form-group">
                <label>Customer <span class="text-danger">*</span></label>
                <select class="form-control" name="id_cust">
                    <?= get_customer_option(set_value('id_cust', $row->id_cust)) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="harga" value="<?= set_value('harga', $row->harga) ?>" />
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="<?= set_value('keterangan', $row->keterangan) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=transaksi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>