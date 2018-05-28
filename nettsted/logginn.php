<?php
include("start.html");
?>
<h3>Innlogging </h3>
<form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
 Brukernavn: <input name="brukernavn" type="text" id="brukernavn"> <br />
 Passord: <input name="passord" type="password" id="passord" > <br />
 <input type="submit" name="logginn" value="Logg inn">
 <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>
Ny bruker ? <br />
<a href="registrerBruker.php">Registrer deg her:</a> <br /> <br />
<?php
 if (isset($_POST ["logginn"]))
 {
 include("sjekk.php");
 $brukernavn=$_POST ["brukernavn"];
 $passord=$_POST["passord"];
 if (!sjekkBrukernavnPassord($brukernavn,$passord))
 {
 print("Feil brukernavn/passord <br />");
 }
 else
 {
 session_start();
 $_SESSION["brukernavn"]=$brukernavn;
 print("<meta http-equiv='refresh' content='0;url=hoved.php'>");
  }
 }

include("slutt.html");
?>
