<h1>Jam</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jam</th>
            <th>Mulai</th>
            <th>Selesai</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_jam 
    WHERE id_jam LIKE '%$q%' OR nm_jam LIKE '%$q%'
    ORDER BY id_jam");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nm_jam ?></td>
            <td><?= substr($row->mulai, 0, 5) ?></td>
            <td><?= substr($row->selesai, 0, 5) ?></td>
        </tr>
    <?php endforeach ?>
</table>