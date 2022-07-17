<?php
class AG
{
    var $num_crommosom; //jumlah kromosom awal yang dibangkitkan
    var $kart = array(); //data waktu
    var $transaksi = array(); //data jam
    var $gen_per_kromosom = array(); //data kuliah
    var $generation = 0; //generasi ke....
    var $max_generation = 2;
    var $crommosom = array(); //array kromosom sesuai $num_cromosom 
    var $no_telp = ''; // menit per sks
    var $success = false; //keadaan jika sudah ada sulosi terbaik
    var $debug = true; //menampilkan debug jika diset true;    
    var $fitness = array(); //nilai fitness setiap kromosom
    var $console = ""; //menyimpan proses algoritma 
    var $total_fitness = 0; //menyimpan total fitness untuk masing-masing kromosom
    var $probability  = array(); //menyimpan probabilitas fitness masing-masing kromosom
    var $com_pro = array(); //menyimpan fitness komulatif untuk masing masing kromosom
    var $rand = array(); //menyimpan bilangan rand())
    var $parent = array(); //menyimpan parent saat crossover

    var $best_fitness = 0; //menyimpan nilai fitness tertinggi
    var $best_cromossom = array(); //menyimpan kromosom dengan fitness tertinggi 

    var $crossover_rate = 75; //prosentase kromosom yang akan dipindah silang
    var $mutation_rate = 25; //prosentase kromosom yang akan dimutasi

    var $_strtotime = array(); //menyimpan nilai strtotime sehingga bisa dipanggil lagi
    var $_timeclash = array(); //menyimpan bentrok sehinggal bisa dipanggil lagi

    var $time_start; //menyimpan waktu mulai proses algoritma
    var $time_end; //menyimpan waktu selesai proses algoritma

    public $total_jam = 4;
    public $min_jarak = 5;
    public $max_jarak = 7;
    public $batas_urut = 2;

    /**
     * konstruktor ketiga pertama kali memanggil class AG
     * inputan waktu, ruang, dan kuliah 
     */
    function __construct($row_kart, $row_transaksi, $row_jam)
    {
        foreach ($row_kart as $row) {
            $this->kart[$row->id_kart] = $row;
        }
        foreach ($row_transaksi as $row) {
            $this->transaksi[$row->id_transaksi] = $row;
        }
        foreach ($row_jam as $row) {
            $this->jam[$row->id_jam] = $row;
        }
    }

    /**
     * mulai memproses algoritma     
     */
    function generate()
    {
        $this->time_start = microtime(true); //seting waktu awal eksekusi

        $this->generate_crommosom();

        /**
         * proses algoritma akan diulang sampai memperoleh nilai 1
         * atau sudah mencapai maksimum generasi (sesuai yang diinputkan)
         */

        while (($this->generation < $this->max_generation) && $this->success == false) {
            $this->generation++;
            $this->console .= "<h4>Generasi ke-$this->generation</h4>";
            $this->console .= "KROMOSOM AWAL:";
            $this->show_crommosom();
            $this->calculate_all_fitness();
            $this->show_fitness();
            if (!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses seleksi
                $this->get_com_pro();
                $this->selection();
                $this->show_crommosom();
                $this->show_fitness();
            }
            if (!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses crossover
                $this->crossover();
                $this->show_crommosom();
                $this->show_fitness();
            }
            if (!$this->success) { //jika fitness terbaik belum mencapai 1, dilanjutkan ke proses mutasi
                $this->mutation();
                $this->show_crommosom();
                $this->show_fitness();
            }
        }

        $this->time_end = microtime(true); //seting waktu akhir eksekusi

        $time = $this->time_end - $this->time_start;

        /**
         * menampilan hasil algoritma
         */
        //print_r($this->calculate_fitness($_SESSION['index'], true));

        echo "<pre style='font-size:0.8em'>\nFITNESS TERBAIK: $this->best_fitness";
        echo "\nExetransaksion Time: $time seconds";
        echo "\nMemory Usage: " . memory_get_usage() / 1024 . ' kilo bytes';
        echo "\nGENERASI: $this->generation";
        echo "\nCROMOSSOM TERBAIK:  " . $this->print_cros($this->best_cromossom) . "</pre>";
        if ($this->debug) {
            echo "<pre style='font-size:0.8em'>$this->console</pre>";
        }
        return $this->best_cromossom;
    }

    /**
     * proses mutasi pada AG
     * mutasi dilakukan sesuai prosentaso "Mutation Rate" yang diinputkan
     */
    function mutation()
    {
        $this->console .= "<h5>Mutasi generasi ke-$this->generation</h5>";
        $this->console .= "GEN ACAK:";
        $gen_per_kromosom  = count($this->transaksi);
        $total_gen = count($this->crommosom) * $gen_per_kromosom;
        $total_mutation = ceil($this->mutation_rate / 100 * $total_gen);

        for ($a = 1; $a <= $total_mutation; $a++) {
            $val = mt_rand(1, $total_gen);

            $cro_index = ceil($val / $gen_per_kromosom) - 1;
            $gen_index = (($val - 1)  % $gen_per_kromosom);

            $this->console .= "\n$val : [$cro_index, $gen_index]";
            $this->crommosom[$cro_index][$gen_index]['kart'] = array_rand($this->kart);
            $this->crommosom[$cro_index][$gen_index]['jam'] = array_rand($this->jam);
        }
        // dd($this->crommosom);
        $this->calculate_all_fitness();
        $this->console .= "\n\nHASIL MUTASI:";
        return false;
    }

    /**
     * mencari nilai crossover dari dua induk
     */
    function get_crossover($key1, $key2)
    {
        $cro1 = $this->crommosom[$key1];
        $cro2 = $this->crommosom[$key2];

        $offspring = mt_rand(0, count($cro1) - 2);
        $new_cro = array();

        for ($a = 0; $a < count($cro1); $a++) {
            if ($a <= $offspring || $cro1[$a] === 'off' || $cro2[$a] === 'off') {
                $new_cro[] =  $cro1[$a];
            } else {
                $new_cro[] =  $cro2[$a];
            }
        }

        $this->console .= "\nCrossover ke 1: $key1 x $key2 dengan offspring: $offspring";
        $this->console .= "\n\t Cro $key1 \t: " . $this->print_cros($this->crommosom[$key1]);
        $this->console .= "\n\t Cro $key2 \t: " . $this->print_cros($this->crommosom[$key2]);
        $this->console .= "\n\t Hasil \t: " . $this->print_cros($new_cro);

        return $new_cro;
    }

    function print_cros($cro)
    {
        $arr = array();
        foreach ($cro as $k => $v) {
            $arr[] = '(' . implode(', ', $v) . ')';
        }
        return implode(', ', $arr);
    }
    /**
     * proses Crossover (pindah silang pada AG)
     */
    function crossover()
    {
        $this->console .= "<h5>Pindah silang generasi ke-$this->generation</h5>";
        $parent = array();

        //menentukan kromosom mana saja sebagai induks
        //jumlahnya berdasarkan crossover rate 
        $this->console .= "BILANGAN ACAK:";
        foreach ($this->crommosom as $key => $val) {
            $rnd = mt_rand() / mt_getrandmax();
            $this->console .= "\nRandom[$key] : $rnd";
            if ($rnd <= $this->crossover_rate / 100)
                $parent[] = $key;
        }
        //menampilkan parent/induk setiap pindah silang         
        $this->console .= "\n\nKROMOSOM INDUK:";
        foreach ($parent as $key => $val) {
            $this->console .= "\nParent[$key] : $val";
        }


        $parent = $parent;
        $c = count($parent);

        //mulai proses pindah silang sesai jumlah induk     
        $this->console .= "\n\nPROSES CROSSOVER:";
        if ($c > 1) {
            for ($a = 0; $a < $c - 1; $a++) {
                $new_cro[$parent[$a]] = $this->get_crossover($parent[$a],  $parent[$a + 1]);
            }

            $new_cro[$parent[$c - 1]] = $this->get_crossover($parent[$c - 1],  $parent[0]);

            //menyimpan kromosom hasil pindah silang dan fitnessnya
            foreach ($new_cro as $key => $val) {
                $this->crommosom[$key] = $val;
                $this->calculate_fitness($key);
            }
        }

        $this->console .= "\n\nHASIL CROSSOVER:";
    }

    /**
     * proses seleksi, memilih gen secara acak
     * dimana fitness yang besar mendapatkan kesempata yang lebih besar
     */
    function selection()
    {
        $this->console .= "<h5>Seleksi generasi ke-$this->generation</h5>";
        $this->get_rand();
        $new_cro = array();
        $this->console .= "\n\nPROSES SELEKSI:";
        foreach ($this->rand as $key => $val) {
            $k = $this->choose_selection($val);
            $new_cro[$key] = $this->crommosom[$k];
            $this->fitness[$key] = $this->fitness[$k];
            $this->console .= "\nK[$key] = K[$k]";
        }
        $this->crommosom = $new_cro;
        $this->console .= "\n\nHASIL SELEKSI:";
    }

    /**
     * mencari nilai probabilitas komulatif
     * 
     * */
    function get_com_pro()
    {

        $this->get_probability();
        $this->com_pro = array();
        $x = 0;
        $this->console .= "\n\nPROBABILITAS KOMULATIF:";
        foreach ($this->probability as $key => $val) {
            $x += $val;
            $this->com_pro[] = $x;
            $this->console .= "\nPK[$key] : $x";
        }
        $this->com_pro;
    }

    /**
     * menghitung fitnes pada kromosom tertentu 
     */
    function calculate_fitness($kode_kromosom)
    {
        $cro = $this->crommosom[$kode_kromosom];

        //** kart sama di waktu sama */

        $c_kart_sama = 0;
        foreach ($cro as $key => $val) {
            foreach ($cro as $k => $v) {
                /** jika bukan transaksi sama */
                if ($key != $k) {
                    $transaksi1 = $this->transaksi[$val['transaksi']];
                    $transaksi2 = $this->transaksi[$v['transaksi']];
                    /** tanggal sama */
                    if ($transaksi1->tanggal == $transaksi2->tanggal) {
                        /** jika kart sama */
                        if ($val['kart'] == $v['kart']) {
                            if ($val['jam'] == $v['jam']) {
                                $c_kart_sama++;
                            }
                        }
                    }
                }
            }
        }


        $max_cart = 4;
        $c_max_kart = 0;
        $arr = array();
        foreach ($cro as $key => $val) {
            $arr[$this->transaksi[$val['transaksi']]->tanggal . '_' . $val['jam']][$key] = $key;
        }
        foreach ($arr as $key => $val) {
            if (count($val) > $max_cart) {
                $c_max_kart++;
            }
        }

        $f['desc'] = "1/(1+$c_kart_sama+$c_max_kart)";
        $f['nilai'] = 1 / (1 + $c_kart_sama + $c_max_kart);

        if ($f['nilai'] == 1) // jika sudah optimal maka berhenti
            $this->success = true;

        if ($f['nilai'] > $this->best_fitness) {
            $this->best_fitness = $f['nilai'];
            $this->best_cromossom = $this->crommosom[$kode_kromosom];
        }

        $this->fitness[$kode_kromosom] = $f;
        return $f;
    }

    function calculate_fitness_baru($kode_kromosom)
    {
        $cro = $this->crommosom[$kode_kromosom];

        /**
         * mengecek kart malam berurutan dengan pagi
         */
        $last_kart = count($this->kart) - 1;
        $c_berurut = 0;
        for ($a = 0; $a < count($cro) - 1; $a++) {
            $kiri = $a;
            $kanan = $a + 1;

            if ($cro[$kanan] === 'off') { //jika data kanan off                
                if ($kanan >= count($cro) - 1) //jika lebih dari data terakhir
                    $kanan = 0; //dibalikkan ke data 0
                else
                    $kanan = $a + 2; //dibandingkan dengan data setelah off
            }

            if ($cro[$kiri] === $last_kart && $cro[$kanan] === 0) {
                $c_berurut++;
            }
        }

        // echo '<pre>' . print_r($min_kart, 1) . '</pre>';

        /**
         * mengecek jarak off
         */
        $c_jarak = 0;
        $position = array();
        for ($a = 0; $a < count($cro); $a++) {
            if ($cro[$a] === 'off') {
                $position[] = $a;
            }
        }

        if ($position) {
            for ($a = 0; $a < count($position); $a++) {
                $jarak = $position[$a] - $position[$a - 1];
                if ($a == 0) { //jika off pertama
                    if ($position[$a] >= $this->max_jarak) { //jika off pertama lebih dari maksimal jarak
                        $c_jarak++;
                    }
                } elseif ($jarak < $this->min_jarak || $jarak > $this->max_jarak) {
                    $c_jarak++;
                }
            }
            $jarak = count($cro) - $position[count($position) - 1];

            if ($jarak >= $this->max_jarak) { //menghitung jarak terakhir dengan yang pertama
                $c_jarak++;
            }
        }

        /**
         * mengecek jumlah off
         */
        $arr_values = array_count_values($cro);
        $c_off = abs($arr_values['off'] - $this->total_jam);

        $f['desc'] = "1/(1+$c_berurut+$c_jarak+$c_off)";
        $f['nilai'] = 1 / (1 + $c_berurut + $c_jarak + $c_off);

        if ($f['nilai'] == 1) // jika sudah optimal maka berhenti
            $this->success = true;

        if ($f['nilai'] > $this->best_fitness) {
            $this->best_fitness = $f['nilai'];
            $this->best_cromossom = $this->crommosom[$kode_kromosom];
        }

        $this->fitness[$kode_kromosom] = $f;
        return $f;
    }

    /**
     * menghitung fitness pada semua kromosom
     */
    function calculate_all_fitness()
    {
        foreach ($this->crommosom as $key => $val) {
            $this->calculate_fitness($key);
        }
    }

    /**
     * menampilkan semua kromosom 
     */
    function show_crommosom()
    {
        foreach ($this->crommosom as $key => $val) {
            $arr = array();
            foreach ($val as $k => $v) {
                $arr[] = "(" . implode(", ", $v) . ')';
            }
            $this->console .= "\nCro[$key]: " . implode(', ', $arr);
        }
    }

    /**
     * membuat kromosom awal sesuai jumlah kromosom yang diinputkan
     */
    function generate_crommosom()
    {
        /**
         * generate kromosom dan gen berdasarkan jumlah customer, jumlah kromosom, dan gen per kromosom
         */
        for ($a = 0; $a < $this->num_crommosom; $a++) {
            foreach ($this->transaksi as $key => $val) {
                $this->crommosom[$a][] = array(
                    'transaksi' => $key,
                    'kart' => array_rand($this->kart),
                    'jam' => array_rand($this->jam),
                );
            }
            $this->fitness[$a] = 0;
        }
    }


    /**
     * menampilkan nilai fitnes untuk masing-masing kromosom
     */
    function show_fitness()
    {
        $this->console .= "\n\nNILAI FITNESS:";
        foreach ($this->fitness as $key => $fit) {
            $this->console .= "\nF[$key]: $fit[desc] = $fit[nilai]";
        }
        $this->get_total_fitness();
        $this->console .= "\nTotal F: " . $this->total_fitness;
    }

    /**
     * mencari garis 
     */
    function get_total_fitness()
    {
        $this->total_fitness = 0;
        //reset($this->fitness);
        foreach ($this->fitness as $val) {
            $this->total_fitness += $val['nilai'];
        }
        return $this->total_fitness;
    }

    /**
     * mencari probabilitas untuk setiap fitness
     * rumusnya adalah  fitness / total fitness
     */
    function get_probability()
    {
        $this->console .= "\n\nPROBABILITAS:";
        $this->probability = array();
        foreach ($this->fitness as $key => $val) {
            $x = $val['nilai'] / $this->total_fitness;
            $this->probability[] = $x;
            $this->console .= "\nP[$key] : $x";
        }
        $this->console .= "\nTotal P: " . array_sum($this->probability);
        return $this->probability;
    }

    /**
     * memilih berdasarkan bilangan random yang diinputkan
     * */
    function choose_selection($rand_numb = 0)
    {
        foreach ($this->com_pro as $key => $val) {
            if ($rand_numb <= $val)
                return $key;
        }
    }

    function get_rand()
    {
        $this->console .= "BILANGAN ACAK:";
        $this->rand = array();
        foreach ($this->fitness as $key => $val) {
            $r = mt_rand() / mt_getrandmax();
            $this->rand[] = $r;
            $this->console .= "\nR[$key] : $r";
        }
    }
}