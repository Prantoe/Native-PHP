<h1>Hasil Jadwal</h1>
<?php
$awal = set_value('awal', date('Y-m-01'));
$akhir = set_value('akhir', date('Y-m-d'));
?>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Sesi</th>
            <th>Jam</th>
            <th>Nama Customer</th>
            <th>Kart</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_jadwal j INNER JOIN tb_transaksi t ON t.id_transaksi=j.id_transaksi INNER JOIN tb_customer c ON c.id_cust=t.id_cust INNER JOIN tb_jam j2 ON j2.id_jam=t.id_jam INNER JOIN tb_kart k ON k.id_kart=j.id_kart WHERE (nm_cust LIKE '%$q%' OR no_telp LIKE '%$q%' OR email LIKE '%$q%') AND tanggal>='$awal' AND tanggal<='$akhir' ORDER BY tanggal, mulai, selesai");
    $no = 0;
    foreach ($rows as $row) :  ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->nm_jam ?></td>
            <td><?= substr($row->mulai, 0, 5) ?>-<?= substr($row->selesai, 0, 5) ?></td>
            <td><?= $row->nm_cust ?></td>
            <td><?= $row->nm_kart ?></td>
        </tr>
    <?php endforeach; ?>
</table>