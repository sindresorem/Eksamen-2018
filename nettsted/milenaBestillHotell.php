<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
 print("Denne siden krever innlogging <br />");
 print("<a href='innlogging.php'>Logg inn</a>");
}
else
{
include("start.html");
?>

<form method="post" action="" id="bestillHotell" name="bestillHotell">
 <div>
	<h3>Velg romtypen du ønsker:</h3>
  Romtype:<select name="romtype" id="romtype">
    <?php include("dynamiske-funksjoner.php"); listeboksRomtype();?>
  </select> <br/>


  <h3>Velg ønsket dato:</h3>
  <script src="kalender.js"> </script>
  <script src="../date-picker-v6/js/datepicker.js"> </script>
  <link rel="stylesheet" type="text/css" href="date-picker-v6/css/datepicker.css" />

  <form method="post" action="" id="skjema" name="skjema">
   Dato fra: <input type="text" id="fradato" name="fradato" required /> <br/>

  <form method="post" action="" id="skjema" name="skjema">
  Dato til: <input type="text" id="tildato" name="tildato" required /> <br/>


  <input type="submit" value="Bestill" id="bestill" name="bestill" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</div></form>
<div id="melding">
</div>

<?php
if (isset($_POST ["registrer"]))

{
   $brukernavn=$_POST["brukernavn"];
   $fornavn=$_POST["fornavn"];
   $etternavn=$_POST["etternavn"];
   $klassekode=$_POST["klassekode"];
   $bildenr=$_POST["bildenr"];
   $leveringsfrist=$_POST["fradato"];


   if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$leveringsfrist || !$bildenr)
   {
      print("Alle felt m&aring; fylles ut");
	  }
	  else
	  {

	       include("db-tilkobling.php");
		   $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
       $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");
		   $antallRader=mysqli_num_rows($sqlResultat);

		   if($antallRader!=0)
		      {
			     print("Student er registrert fra f&oslash;r");
			  }
			  else
			  {
			    $sqlSetning="INSERT INTO student (brukernavn, fornavn, etternavn, klassekode, leveringsfrist, bildenr) VALUES ('$brukernavn','$fornavn','$etternavn','$klassekode','$leveringsfrist','$bildenr');";
                mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere i database");

                print("F&oslash;lgende verdier er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode $bildenr");
			  }
	     }
}
?>

<?php
 if (isset($_POST ["registrer"]))
 {
 $fradato=$_POST ["fradato"];
 print ("F&oslash;lgende leveringsfrist er n&aring; registrert: <br />  $leveringsfrist <br />");
}

include("slutt.html");
}
?>
