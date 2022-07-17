<div class="page-header">
    <h1>Transaksi</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="transaksi" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari Data</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=transaksi_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=transaksi" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Customer</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th style="width:200px;">Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_transaksi t INNER JOIN tb_customer c ON c.id_cust=t.id_cust WHERE nm_cust LIKE '%$q%' OR no_telp LIKE '%$q%' OR email LIKE '%$q%' ORDER BY tanggal DESC");
            $no = 0;
            foreach ($rows as $row) :  ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->nm_cust ?></td>
                    <td><?= number_format($row->harga) ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=transaksi_ubah&ID=<?= $row->id_transaksi ?>"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=transaksi_hapus&ID=<?= $row->id_transaksi ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>