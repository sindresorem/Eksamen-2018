<?php
include("start.html");
?>

<h3>Registrer bruker </h3>
<form action="" id="registrerBrukerSkjema" name="registrerBrukerSkjema" method="post">
 Brukernavn: <input name="brukernavn" type="text" id="brukernavn" required> <br />
 Passord: <input name="passord" type="password" id="passord" required> <br />
 <input type="submit" name="registrerbruker" value="Registrer bruker">
 <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>

<?php
 if (isset($_POST ["registrerbruker"]))
 {
 include("db-tilkobling.php");
 $brukernavn=$_POST ["brukernavn"];
 $passord=$_POST["passord"];
 if (!$brukernavn || !$passord)
 {
 print ("Brukernavn og passord m&aring; fylles ut <br />");
 }
 else
 {
 $sqlSetning="SELECT * FROM bruker WHERE brukernavn ='$brukernavn';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra database");
 if (mysqli_num_rows($sqlResultat)!=0)
 {
 print ("Brukernavnet er registrert fra f&oslash;r <br />");
 }
 else
 {
 $sqlSetning="INSERT INTO bruker VALUES('$brukernavn','$passord');";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i database");
 print ("F&oslash;lgende data er n&aring; registrert: <br /> ");
 print ("Brukernavn: $brukernavn <br /> Passord: $passord <br /> <br />");
 print ("<a href='logginn.php'>G&aring; til innloggingsside </a>");
 }
 }
}

include("slutt.html");
?>
