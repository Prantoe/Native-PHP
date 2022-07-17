<h1>Transaksi</h1>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Customer</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_transaksi t INNER JOIN tb_customer c ON c.id_cust=t.id_cust WHERE nm_cust LIKE '%$q%' OR no_telp LIKE '%$q%' OR email LIKE '%$q%' ORDER BY tanggal DESC, mulai DESC");
    $no = 0;
    foreach ($rows as $row) :  ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->nm_cust ?></td>
            <td><?= $row->nm_jam ?></td>
            <td><?= number_format($row->harga) ?></td>
            <td><?= $row->keterangan ?></td>
        </tr>
    <?php endforeach; ?>
</table>