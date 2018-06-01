<?php /*db-tilkobling*/

$host="localhost";
$user="root";
$password="";
$database="prg1100";


$db=mysqli_connect($host,$user,$password,$database) or die ("Ikke kontakt med database-server.");

?>
