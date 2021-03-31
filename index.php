<?
$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");

// konfigurasi koneksi
$host       =  $db["host"];
$dbuser     =  $db["user"];
$dbpass     =  $db["pass"];
$port       =  $db["port"];
$dbname    =  $db["path"];

try {
  $conn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE MyGuests (
  id INT(6),
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table MyGuests created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
