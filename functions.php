<?php
error_reporting(~E_NOTICE);
session_start();
date_default_timezone_set('Etc/GMT-7');
ini_set('max_exetransaksion_time', 60 * 1);
ini_set('memory_limit', '64M');

include 'config.php';
include 'includes/db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include 'includes/general.php';
include 'includes/paging.php';

$db->query("DELETE FROM tb_transaksi WHERE id_cust NOT IN (SELECT id_cust FROM tb_customer)");

function _post($key, $val = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];
    else
        return $val;
}

function _get($key, $val = null)
{
    global $_GET;
    if (isset($_GET[$key]))
        return $_GET[$key];
    else
        return $val;
}

function _session($key, $val = null)
{
    global $_SESSION;
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    else
        return $val;
}

$mod = _get('m');
$act = _get('act');

if (!isset($_SESSION['level']))
    $_SESSION['level'] = 'guest';
function is_able($mod)
{
    $role = array(
        'admin' => array(
            'admin',
            'customer',
            'kart',
            'jam',
            'transaksi',
            'hitung',
            'hasil',
            'password',
            'logout',
        ),
        'gudang' => array(
            'customer',
            'kart',
            'transaksi',
            'transaksi_aksi',
            'hitung',
            'password',
            'logout',
        ),
        'customer' => array(
            'transaksi_saya',
            'password',
            'logout',
        ),
        'guest' => array(
            'login',
            'hasil',
        ),
    );

    if (!isset($role[$_SESSION['level']])) {
        $_SESSION['level'] = 'guest';
    }
    return in_array($mod, (array)$role[$_SESSION['level']]);
}

function is_hidden($mod)
{
    return (is_able($mod)) ? '' : 'hidden';
}

function set_jadwal_berikutnya($hasil, $arr_cust, $transaksi_cust, $jam)
{
    $arr = array();
    $a = 0;
    $arr_cust = array_keys($arr_cust);
    foreach ($arr_cust as $key) {
        $x = array_slice($hasil, $a);
        $y =  array_slice($hasil, 0, $a);
        $arr[$key] = array_merge($x, $y);
        $a++;

        if ($a >= count($hasil))
            $a = 0;
    }
    foreach ($transaksi_cust as $key => $val) {
        foreach ($val as $k => $v) {
            $arr[$key][$v] = 'transaksi';
        }
    }
    foreach ($arr as $key => $val) {
        foreach ($val as $k => $v) {
            if (in_array($k, $jam))
                $arr[$key][$k] = 'L';
        }
    }
    return $arr;
}

function set_jadwal_berikutnya2($hasil, $arr_cust, $transaksi_cust)
{
    $arr = array();
    $a = 0;
    $arr_cust = array_keys($arr_cust);

    $posisi_off = 0;
    foreach ($hasil as $key => $val) {
        if ($val == 'off') {
            $posisi_off = $key;
            break;
        }
    }
    $karts = array();
    foreach ($hasil as $key => $val) {
        if ($val != 'off')
            $karts[] = $val;
    }

    // echo '<pre>' . print_r($hasil, 1) . '</pre>';
    // echo '<pre>' . print_r(array_count_values($karts), 1) . '</pre>';


    // foreach ($karts as $key => $val) {
    // }

    $batas = 7;
    $kart_awal = 1;
    foreach ($arr_cust as $key) {
        $kart = $kart_awal;
        foreach ($hasil as $k => $v) {
            if ($k % $batas == $posisi_off % $batas) {
                $arr[$key][$k] = 'off';
            } else {
                $arr[$key][$k] = $karts[$kart];
                $kart++;
                if ($kart >= count($karts))
                    $kart = 0;
            }
        }
        $kart_awal++;
        if ($kart_awal > count($karts) - 1) //jika kart yang dicopy sudah lebih dari yang terakhir
            $kart_awal = 0;

        $posisi_off--;
        if ($posisi_off < 0)
            $posisi_off += $batas;
    }

    foreach ($transaksi_cust as $key => $val) {
        foreach ($val as $k => $v) {
            $arr[$key][$v] = 'transaksi'; //mengisi transaksi
        }
    }

    return $arr;
}










function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function get_no_telp_option($selected = '')
{
    global $BAGIAN;
    $a = '';
    foreach ($BAGIAN as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_level_option($selected = '')
{
    $arr = array(
        'admin' => 'Admin',
        'admin' => 'Admin',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_bulan_option($selected = '')
{
    $arr = array(
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'Nopenber',
        '12' => 'Desember',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_tahun_option($selected = '')
{
    $arr = array();

    for ($a = date('Y') + 5; $a >= date('Y') - 5; $a--) {
        $arr[$a] = $a;
    }

    $a = "";
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_login_option($selected = '')
{
    $arr = array(
        'admin' => 'Admin/KA Gudang',
        'customer' => 'Customer',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_customer_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT id_cust, nm_cust FROM tb_customer ORDER BY id_cust");
    $a = '';
    foreach ($rows as $row) {
        if ($row->id_cust == $selected)
            $a .= "<option value='$row->id_cust' selected>$row->nm_cust</option>";
        else
            $a .= "<option value='$row->id_cust'>$row->nm_cust</option>";
    }
    return $a;
}

function get_kart_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT id_kart, nm_kart FROM tb_kart ORDER BY id_kart");
    $a = '';
    foreach ($rows as $row) {
        if ($row->id_kart == $selected)
            $a .= "<option value='$row->id_kart' selected>$row->nm_kart</option>";
        else
            $a .= "<option value='$row->id_kart'>$row->nm_kart</option>";
    }
    return $a;
}

function get_jam_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_jam ORDER BY id_jam");
    $a = '';
    foreach ($rows as $row) {
        $mulai = substr($row->mulai, 0, 5);
        $selesai = substr($row->selesai, 0, 5);
        if ($row->id_jam == $selected)
            $a .= "<option value='$row->id_jam' selected>$row->nm_jam ($mulai - $selesai)</option>";
        else
            $a .= "<option value='$row->id_jam'>$row->nm_jam ($mulai - $selesai)</option>";
    }
    return $a;
}

function dd($arr)
{
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}
