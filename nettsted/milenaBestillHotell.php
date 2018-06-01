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
  <script src="date-picker-v6/js/datepicker.js"> </script>
  <link rel="stylesheet" type="text/css" href="date-picker-v6/css/datepicker.css" />

  <form method="post" action="" id="skjema" name="skjema">
   Dato fra: <input type="text" id="fradato" name="fradato" required /> <br/>

  <form method="post" action="" id="skjema2" name="skjema2">
   Dato til: <input type="text" id="tildato" name="tildato" required /> <br/>


  <input type="submit" value="Bestill" id="bestill" name="bestill" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</div></form>
<div id="melding">
</div>

<?php
if (isset($_POST ["bestill"]))

{
   $romtype=$_POST["romtype"];
   $datoFra=$_POST["fradato"];
   $datoTil=$_POST["tildato"];

   if(!$romtype || !$datoFra || !$datoTil)
   {
      print("Alle felt m&aring; fylles ut for å kunne gjennomf&oslash;re hotellbestillingen");
	  }
	  else
	  {

	       include("db-tilkoblingMilena2.php");
		   $sqlSetning="SELECT * FROM milenabestillhotell WHERE romtype='$romtype';";

       $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");
		   $antallRader=mysqli_num_rows($sqlResultat);

		   if($antallRader!=0)
		      {
			     print(" er registrert fra f&oslash;r");
			  }
			  else
			  {
			    $sqlSetning="INSERT INTO milenabestillhotell (romtype) VALUES ('$romtype');";

          mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere i database");

                print("F&oslash;lgende bestilling er n&aring; registrert: $romtype $datoFra $datoTil");
			  }
	     }
}
}

?>
