<div class="page-header">
    <h1>Kart</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="kart" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cari Data</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=kart_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=kart" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kart</th>
                    <th style="width:200px;">Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_kart WHERE id_kart LIKE '%$q%' OR nm_kart LIKE '%$q%' ORDER BY id_kart");
            $no = 0;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nm_kart ?></td>
                    <td class="nw">
                        <a class="btn  btn-warning" href="?m=kart_ubah&ID=<?= $row->id_kart ?>"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                        <a class="btn  btn-danger" href="aksi.php?act=kart_hapus&ID=<?= $row->id_kart ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>