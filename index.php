<?
$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");

// konfigurasi koneksi
$host       =  $db["host"];
$dbuser     =  $db["user"];
$dbpass     =  $db["pass"];
$port       =  $db["port"];
$dbname    =  $db["path"];

// script koneksi php postgree
$conn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 
 
if($conn)
{
    echo "Koneksi Berhasil";
}else
{
    echo "Gagal melakukan Koneksi";
}

  // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // sql to create table
   $sql = "CREATE TABLE tbl_pegawai (
   id_pegawai INT(5) NOT NULL AUTO_INCREMENT,
   nama_pegawai VARCHAR(20) DEFAULT NULL,
   jenis_kelamin CHAR(1) DEFAULT NULL,
   gaji DECIMAL(10,0) DEFAULT NULL,
   alamat VARCHAR(20) DEFAULT NULL,
   departemen VARCHAR(5) DEFAULT NULL,
   PRIMARY KEY (id_pegawai)
   )";

   // use exec() because no results are returned
   $conn->exec($sql);
   echo "Table tbl_pegawai berhasil di buat";
?>
