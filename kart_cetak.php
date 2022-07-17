<h1>Kart</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kart</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_kart 
    WHERE id_kart LIKE '%$q%' OR nm_kart LIKE '%$q%'
    ORDER BY id_kart");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nm_kart ?></td>
        </tr>
    <?php endforeach; ?>
</table>