<?php
//membuat class databse
class database {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "21071993";
    private $dbName = "crud_oop";

    // method koneksi MySQL
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    }

    // method tambah data (insert)	
    function tambahAnggota($nama, $alamat, $telpon) {
        $query = "INSERT INTO anggota (nama, alamat, telpon) VALUES ('$nama', '$alamat','$telpon')";
        $hasil = mysql_query($query);

        if ($hasil)
            echo"<meta http-equiv='refresh' content='0; url=index.php'>";
        else
            echo "Data Anggota gagal disimpan ke database";
    }

    // method tampil data 	
    function tampilAnggota() {
        $query = mysql_query("SELECT * FROM anggota ORDER BY id_anggota");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    // method hapus data
    function hapusAnggota($id_agt) {
        $query = mysql_query("DELETE FROM anggota WHERE id_anggota='$id_agt'");
        echo "<p>Data Anggota dengan ID " . $id_agt . " sudah dihapus</p>";
    }

    // method membaca data anggota 
    function bacaDataAnggota($field, $id_agt) {
        $query = "SELECT * FROM anggota WHERE id_anggota = '$id_agt'";
        $hasil = mysql_query($query);
        $data = mysql_fetch_array($hasil);
        if ($field == 'nama')
            return $data['nama'];
        else if ($field == 'alamat')
            return $data['alamat'];
        else if ($field == 'telpon')
            return $data['telpon'];
    }

    // method untuk proses update data anggota
    function updateDataAnggota($id_anggota, $nama, $alamat, $telpon) {
        $query = "UPDATE anggota SET	nama='$nama', alamat ='$alamat', telpon='$telpon' WHERE id_anggota='$id_anggota'";
        mysql_query($query);
        echo "<p>Data Anggota sudah di update.</p>";
    }

}
?>
