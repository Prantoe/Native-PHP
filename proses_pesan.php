<?php
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nm_cust = $_POST['nm_cust'];
		$no_telp = $_POST['no_telp'];
		$email = $_POST['email'];
		
		// include database connection file
        $hostname = "localhost";
        $database = "ag_gokart";
        $username = "root";
        $password = "";
        $kon = mysqli_connect($hostname, $username, $password, $database);
        if (!$kon) {
            die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
        }
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO tb_customer(nm_cust,no_telp,email) VALUES('$nm_cust','$no_telp','$email')");
        header("location:index.php");
	}
?>