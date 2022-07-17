<?php
require_once 'functions.php';

/** login */
if ($mod == 'login') {
    $email = esc_field($_POST['email']);
    $pass = esc_field($_POST['pass']);

        $row = $db->get_row("SELECT * FROM tb_admin WHERE email='$email' AND pass='$pass'");
        if ($row) {
            $_SESSION['login'] = $row->email;
            $_SESSION['level'] = 'admin';
            redirect_js("pages.php");
        } else {
            print_msg("Salah kombinasi username dan password.");
        }
    }
 else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    if (in_array($_SESSION['level'], array('admin', 'gudang')))
        $row = $db->get_row("SELECT * FROM tb_admin WHERE admin='$_SESSION[login]' AND pass='$pass1'");
    else
        $row = $db->get_row("SELECT * FROM tb_customer WHERE id_cust='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        if (in_array($_SESSION['level'], array('admin', 'gudang')))
            $db->query("UPDATE tb_admin SET pass='$pass2' WHERE admin='$_SESSION[login]'");
        else
            $db->query("UPDATE tb_customer SET pass='$pass2' WHERE id_cust='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login'], $_SESSION['level']);
    header("location:index.php");
}

/** transaksi */
elseif ($mod == 'transaksi_tambah') {
    $id_cust = $_POST['id_cust'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    if ($id_cust == '' || $tanggal == '' || $harga == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_transaksi (id_cust, tanggal, harga, keterangan) 
            VALUES ('$id_cust', '$tanggal', '$harga', '$keterangan')");
        redirect_js("pages.php?m=transaksi");
    }
} else if ($mod == 'transaksi_ubah') {
    $id_cust = $_POST['id_cust'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    if ($id_cust == '' || $tanggal == '' || $harga == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_transaksi SET id_cust='$id_cust', tanggal='$tanggal', harga='$harga', keterangan='$keterangan' WHERE id_transaksi='$_GET[ID]'");
        redirect_js("pages.php?m=transaksi");
    }
} else if ($act == 'transaksi_hapus') {
    $db->query("DELETE FROM tb_transaksi WHERE id_transaksi='$_GET[ID]'");
    header("location:pages.php?m=transaksi");
}

/** admin */
elseif ($mod == 'admin_tambah') {
    $nm_admin = $_POST['nm_admin'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($nm_admin == '' || $email == '' || $pass == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_admin WHERE email='$email'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("INSERT INTO tb_admin (nm_admin, email, pass) 
            VALUES ('$nm_admin', '$email', '$pass')");
        redirect_js("pages.php?m=admin");
    }
} else if ($mod == 'admin_ubah') {
    $nm_admin = $_POST['nm_admin'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($nm_admin == '' || $email == '' || $pass == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_admin WHERE email='$email' AND id_admin<>'$_GET[ID]'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("UPDATE tb_admin SET nm_admin='$nm_admin', email='$email', pass='$pass' WHERE id_admin='$_GET[ID]'");
        redirect_js("pages.php?m=admin");
    }
} else if ($act == 'admin_hapus') {
    $db->query("DELETE FROM tb_admin WHERE id_admin='$_GET[ID]'");
    header("location:pages.php?m=admin");
}

/** customer */
elseif ($mod == 'customer_tambah') {
    $nm_cust = $_POST['nm_cust'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    if ($nm_cust == '' || $no_telp == '' || $email == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_customer WHERE email='$email'"))
        print_msg("Email sudah ada!");
    else {
        $db->query("INSERT INTO tb_customer (nm_cust, no_telp, email) 
            VALUES ('$nm_cust', '$no_telp', '$email')");
        redirect_js("pages.php?m=customer");
    }
} else if ($mod == 'customer_ubah') {
    $nm_cust = $_POST['nm_cust'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    if ($nm_cust == '' || $no_telp == '' || $email == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_customer SET nm_cust='$nm_cust', no_telp='$no_telp', email='$email', email='$email' WHERE id_cust='$_GET[ID]'");
        redirect_js("pages.php?m=customer");
    }
} else if ($act == 'customer_hapus') {
    $db->query("DELETE FROM tb_customer WHERE id_cust='$_GET[ID]'");
    header("location:pages.php?m=customer");
}

/** kart */
elseif ($mod == 'kart_tambah') {
    $nm_kart = $_POST['nm_kart'];

    if ($nm_kart == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_kart (nm_kart) VALUES ('$nm_kart')");
        redirect_js("pages.php?m=kart");
    }
} else if ($mod == 'kart_ubah') {
    $nm_kart = $_POST['nm_kart'];

    if ($nm_kart == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_kart SET nm_kart='$nm_kart' WHERE id_kart='$_GET[ID]'");
        redirect_js("pages.php?m=kart");
    }
} else if ($act == 'kart_hapus') {
    $db->query("DELETE FROM tb_kart WHERE id_kart='$_GET[ID]'");
    header("location:pages.php?m=kart");
}


/** jam */
elseif ($mod == 'jam_tambah') {
    $nm_jam = $_POST['nm_jam'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    if ($nm_jam == '' || $mulai == '' || $selesai == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_jam (nm_jam, mulai, selesai) VALUES ('$nm_jam', '$mulai', '$selesai')");
        redirect_js("pages.php?m=jam");
    }
} else if ($mod == 'jam_ubah') {
    $nm_jam = $_POST['nm_jam'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];

    if ($nm_jam == '' || $mulai == '' || $selesai == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_jam SET nm_jam='$nm_jam', mulai='$mulai', selesai='$selesai' WHERE id_jam='$_GET[ID]'");
        redirect_js("pages.php?m=jam");
    }
} else if ($act == 'jam_hapus') {
    $db->query("DELETE FROM tb_jam WHERE id_jam='$_GET[ID]'");
    header("location:pages.php?m=jam");
}
