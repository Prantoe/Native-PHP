<div class="page-header">
    <h1>Hasil Penjadwalan</h1>
</div>
<?php
$awal = set_value('awal', date('Y-m-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="hasil" />
            <div class="form-group">
                <input class="form-control" type="date" name="awal" value="<?= $awal ?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="date" name="akhir" value="<?= $akhir ?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q"
                    value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari Data</button>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=hasil&awal=<?= $awal ?>&akhir=<?= $akhir ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Sesi</th>
                    <th>Jam</th>
                    <th>Nama Customer</th>
                    <th>Kart</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_jadwal j INNER JOIN tb_transaksi t ON t.id_transaksi=j.id_transaksi INNER JOIN tb_customer c ON c.id_cust=t.id_cust INNER JOIN tb_jam j2 ON j2.id_jam=j.id_jam INNER JOIN tb_kart k ON k.id_kart=j.id_kart WHERE (nm_cust LIKE '%$q%' OR no_telp LIKE '%$q%' OR email LIKE '%$q%') AND tanggal>='$awal' AND tanggal<='$akhir' ORDER BY tanggal, mulai, selesai");
            $no = 0;
            foreach ($rows as $row) :  ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td><?= $row->nm_jam ?></td>
                    <td><?= substr($row->mulai, 0, 5) ?>-<?= substr($row->selesai, 0, 5) ?></td>
                    <td><?= $row->nm_cust ?></td>
                    <td><?= $row->nm_kart ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=transaksi_ubah&ID=<?= $row->id_cust ?>"><span class="glyphicon glyphicon-edit">Edit</span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=transaksi_hapus&ID=<?= $row->id_cust ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash">Hapus</span></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>