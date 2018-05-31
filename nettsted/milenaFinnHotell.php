<?php
include("start.html");
?>
<h3>Oversikt over ulike hoteller</3>

	<h3>Velg sted</h3>

<form method="post" action="" id="finnHotellSkjema" name"finnHotellSkjema" onSubmit="return validerFinnHotellSted()">
  Sted
  <select name="sted" id="sted">
    <?php include ("dynamiske-funksjoner-milena.php"); listeboksSted();?>
  </select> <br/>
  <input type="submit" value="Velg sted" name="finnStedKnapp" id="finnStedKnapp">
</form>

<?php
if(isset($_POST["finnStedKnapp"]))
{
   include("db-tilkobling.php");
   $sted=$_POST ["sted"];

   $sqlSetning="SELECT * FROM hotell WHERE sted='$sted';";
   $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

   $rad=mysqli_fetch_array($sqlResultat);
   $sted=$rad["sted"];

   print("<h3>Velg hotell</h3>");
   print("<br/>");
   print("<form method='post' action='' id='endreKlasseSkjema' name='endreKlasseSkjema'> ");
   print("Sted <input type='text'value='$sted' name='sted' id='sted' readonly/> <br/>");
   print ("Klassenavn <input type='text' value='$klassenavn' name='klassenavn' id='klassenavn' required /> <br/>");
   print("<input type='submit' value='Velg' name='velg' id='velg'> ");
   print ("</form>");
 }

 if (isset($_POST["velgSted"]))
{
   $klassekode=$_POST["klassekode"];
   $klassenavn=$_POST["klassenavn"];

  if(!$klassekode || !$klassenavn)
  {
    print ("Alle felt m&aring; fylles ut");
  }
  else
  {
    include("db-tilkobling.php");
    $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn' WHERE klassekode='$klassekode';";
    mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre date i databasen");
    print ("Klasse med klassekode $klassekode er n&aring; endret<br/>");
  }

include("slutt.html");
}
?>






























<!-- <h3>Velg hotell</h3>

<form method="post" action="" id="velgHotellSkjema" name"velgHotellSkjema" onSubmit="return validerVelgHotell()">
Sted
<select name="sted" id="sted">
	<?php /* include ("dynamiske-funksjoner-milena.php"); listeboksHotell();?>
</select> <br/>
<input type="submit" value="Velg hotell" name="velgHotellKnapp" id="velgHotellKnapp">
</form>



<?php
	if(isset($_POST["finnStedKnapp"]))
		{

			/*include("db-tilkobling.php");
			$sted=$_POST["sted"];

			/*$sqlSetning="SELECT hotellnavn FROM hotell WHERE sted='$sted';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

			/*$rad=mysqli_fetch_array($sqlResultat);
			$hotellnavn=$rad["hotellnavn"];

		/*	print("<br/>");
			print("<form method='post' action='' id='finnHotellSkjema' name='finnHotellSkjema'>");
			print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
			print("Sted <input type='text' value='$hotellnavn' id='sted' name='sted' readonly /><br/>");
			print("Hotellnavn <select name='hotellnavn' id='hotellnavn'>");
				include("dynamiskeFunksjoner1.php"); listeboksHotellnavn($sted);
			print("</select> <br/>");
			print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
			print("<input type='submit' value='Hotell' id='finnHotellKnapp' name='finnHotellKnapp'>");
			print("</form>");
		}

		/*if(isset($_POST["finnHotellKnapp"]))
			{
				$sted=$_POST["sted"];
				$hotellnavn=$_POST["hotellnavn"];


						include("db-tilkobling.php");

						$sqlSetning="UPDATE hotell SET hotellnavn='$hotellnavn' WHERE sted='$sted';";
						mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");

						print("Informasjon for sted $sted er endret <br/>");

		/*	}

include("slutt.html");
?>*/
