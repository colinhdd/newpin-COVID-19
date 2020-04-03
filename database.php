<?php
// used to connect to the database
$host = 'localhost';
$db_name = 'users';
$username = 'root';
$password = '';

  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'users';

$con=mysqli_connect($host,$user,$pass,$db);

if($con)

echo 'This fucking works';

?>