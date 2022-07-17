<div class="page-header">
    <h1>Penjadwalan</h1>
</div>
<?php
$success = true;
$a = 10;
$b = 25;
$c = 75;
$d = 25;

$awal = set_value('awal', date('Y-m-01'));
$akhir = set_value('akhir', date('Y-m-d'));

if (isset($_GET['num_kromosom'])) {
    $num_kromosom = $_GET['num_kromosom'];
    if ($num_kromosom < $a || $num_kromosom > 500) {
        print_msg("Masukkan jumlah kromosom dari $a sampai 500");
        $success = false;
    }

    $max_generation = $_GET['max_generation'];
    if ($max_generation < $b || $max_generation > 500) {
        print_msg("Masukkan maksimal generasi dari $b sampai 500");
        $success = false;
    }

    $crossover_rate = $_GET['crossover_rate'];
    if ($crossover_rate < 1 || $crossover_rate > 100) {
        print_msg("Masukkan dari 1 sampai 100");
        $success = false;
    }

    $mutation_rate = $_GET['mutation_rate'];
    if ($mutation_rate < 1 || $mutation_rate > 100) {
        print_msg("Masukkan dari 1 sampai 100");
        $success = false;
    }
} else {
    $num_kromosom = $a;
    $max_generation = $b;
    $crossover_rate = $c;
    $mutation_rate = $d;
}
?>
<div class="row">
    <div class="col-md-6">
        <form action="?">
            <input type="hidden" name="m" value="hitung" />
            <div class="form-group">
                <label>Tanggal Awal</label>
                <input class="form-control" type="date" value="<?= $awal ?>" name="awal" />
            </div>
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <input class="form-control" type="date" value="<?= $akhir ?>" name="akhir" />
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="debug" <?= (isset($_GET['debug'])) ? 'checked' : '' ?> name="debug" />
                    Tampilkan proses algoritma
                </label>
            </div>
            <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                aria-controls="collapseExample">
                Opsi Lain
            </a>
            <div class="collapse" id="collapseExample">
                <hr />
                <div class="form-group">
                    <label>Jumlah Kromosom Dibangkitkan</label>
                    <input class="form-control" type="text" name="num_kromosom" value="<?= $num_kromosom ?>" />
                    <p class="help-block">Masukkan antara <?= $a ?>-500</p>
                </div>
                <div class="form-group">
                    <label>Maksimal Generasi</label>
                    <input class="form-control" type="text" name="max_generation" value="<?= $max_generation ?>" />
                    <p class="help-block">Masukkan antara <?= $b ?>-500</p>
                </div>
                <div class="form-group">
                    <label>Crossover Rate</label>
                    <input class="form-control" type="text" name="crossover_rate" value="<?= $crossover_rate ?>" />
                    <p class="help-block">Masukkan antara 1-100</p>
                </div>
                <div class="form-group">
                    <label>Mutation Rate</label>
                    <input class="form-control" type="text" name="mutation_rate" value="<?= $mutation_rate ?>" />
                    <p class="help-block">Masukkan antara 1-100</p>
                </div>
            </div>
            <button class="btn btn-primary">Generate Jadwal</button>
            <?php if ($success && isset($_GET['num_kromosom'])) : ?>
            <a class="btn btn-success" href="?m=hasil&awal=<?= $awal ?>&akhir=<?= $akhir ?>" target="_blank">Lihat
                Jadwal</a>
            <?php endif ?>
        </form>
    </div>
</div>
<?php
include 'ag.php';

if ($success && isset($_GET['num_kromosom'])) {
    echo '<hr />';


    $row_kart =  $db->get_results("SELECT * FROM tb_kart ORDER BY id_kart");
    $row_transaksi =  $db->get_results("SELECT * FROM tb_transaksi WHERE tanggal>='$awal' AND tanggal<='$akhir'");
    $row_jam =  $db->get_results("SELECT * FROM tb_jam ORDER BY id_jam");

    $ag = new AG($row_kart, $row_transaksi, $row_jam);
    $ag->num_crommosom = $num_kromosom;
    $ag->max_generation = $max_generation;
    $ag->debug = _get('debug');
    $ag->crossover_rate = $crossover_rate;
    $ag->mutation_rate = $mutation_rate;
    $hasil = $ag->generate();

    $db->query("DELETE FROM tb_jadwal WHERE id_transaksi IN (SELECT id_transaksi FROM tb_transaksi WHERE tanggal>='$awal' AND tanggal<='$akhir')");
    foreach ($hasil as $key => $val) {
        $db->query("REPLACE INTO tb_jadwal (id_transaksi, id_kart, id_jam) VALUES ('$val[transaksi]', '$val[kart]', '$val[jam]')");
    }
}
?>