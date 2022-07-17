<h1>Admin</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Admin</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_admin ORDER BY id_admin");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nm_admin ?></td>
            <td><?= $row->email ?></td>
        </tr>
    <?php endforeach; ?>
</table>