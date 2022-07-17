<h1>Customer</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Telpon</th>
            <th>Email</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_customer 
        WHERE id_cust LIKE '%$q%' OR nm_cust LIKE '%$q%' OR no_telp LIKE '%$q%' OR email LIKE '%$q%'
        ORDER BY id_cust");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nm_cust ?></td>
            <td><?= $row->no_telp ?></td>
            <td><?= $row->email ?></td>
        </tr>
    <?php endforeach; ?>
</table>