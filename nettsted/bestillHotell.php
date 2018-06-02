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

	<h3>Hoteller</h3>

<form method="post" action="" id="finnStedSkjema" name="finnStedSkjema">
	Hvor ønsker du å dra?
	<select name="sted" id="sted">
	<?php include("dynamiske-funksjoner.php");listeboksSted();?>
	</select>
	<input type="submit" value="Finn hotell" id="finnStedKnapp" name="finnStedKnapp">
</form>

<?php
	if(isset($_POST["finnStedKnapp"]))
		{
			include("db-tilkoblingMilena.php");

			$sted=$_POST["sted"];

			$sqlSetning="SELECT * FROM hotell WHERE sted='$sted';";
			$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");

			$rad=mysqli_fetch_array($sqlResultat);
			$hotellnavn=$rad["hotellnavn"];

			print("<br/>");
			print("<form method='post' action='' id='finnHotellSkjema' name='finnHotellSkjema'>");
			print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
			print("Hotellnavn <select name='hotellnavn' id='hotellnavn'>");
				include("dynamiskeFunksjoner1.php"); listeboksHotellnavn();
			print("</select> <br/>");
			print("<input type='submit' value='Hotell' id='finnHotellKnapp' name='finnHotellKnapp'>");
			print("</form>");
		}

		if(isset($_POST["finnHotellKnapp"]))
			{
				include("db-tilkoblingMilena.php");
				$sted=$_POST["sted"];
				$hotellnavn=$_POST["hotellnavn"];

						print("Treff for hotell $hotellnavn");

						$sqlSetning="SELECT * FROM hotellromtype WHERE hotellnavn='$hotellnavn';";
						$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra database");
						$antallRader=mysqli_num_rows($sqlResultat);

						$rad=mysqli_fetch_array($sqlResultat);
						$hotellnavn=$rad["hotellnavn"];
						$romtype=$rad["romtype"];
						$antallrom=$rad["antallrom"];

						print("<br/>");
						print("<form method='post' action='' id='finnHotellSkjema' name='finnHotellSkjema'>");
						print("Sted <input type='text' value='$sted' id='sted' name='sted' readonly /><br/>");
						print("Hotell <input type='text' value='$hotellnavn' id='hotellnavn' name='hotellnavn' readonly /><br/>");
						print("Romtype <select name='romtype' id='romtype'>");
							include("dynamiskeFunksjoner1.php"); listeboksRomtype();
						print("</select> <br/>");
						print("Antall rom <input type='text' id='booketRom' name='booketRom' />");
						print("<input type='submit' value='Bestill' id='bestillKnapp' name='bestillKnapp'>");
						print("<input type='reset' value='Nullstill' id='nullstill' name='nullstill'>");
						print("</form>");
				}

        ?>

        <h3>Velg ønsket dato:</h3>
          <script src="kalender.js"> </script>
          <script src="date-picker-v6/js/datepicker.js"> </script>
          <link rel="stylesheet" type="text/css" href="date-picker-v6/css/datepicker.css" />

          <form method="post" action="" id="skjema" name="skjema">
           Dato fra: <input type="text" id="fradato" name="fradato" required /> <br/>

           <form method="post" action="" id="skjema2" name="skjema2">
            Dato til: <input type="text" id="tildato" name="tildato" required /> <br/>

           <h4>Skriv inn brukernavn og trykk bestill for å bekrefte hotellbestillingen</h4></br>
           Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
        </br>
        </br>
          <input type="submit" value="Bestill" id="bestill" name="bestill" />
          <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
        </div></form>
        <div id="melding">
        </div>

        <?php
        if (isset($_POST ["bestill"]))

        {
           $brukernavn=$_POST["brukernavn"];
           $romtype=$_POST["romtype"];
           $datoFra=$_POST["fradato"];
           $datoTil=$_POST["tildato"];


           if(!$brukernavn || !$romtype || !$datoFra || !$datoTil)
           {
              print("Alle felt m&aring; fylles ut for å kunne gjennomf&oslash;re hotellbestillingen");
        	  }
        	  else
        	  {

        	       include("db-tilkoblingMilena.php");
               $sqlSetning="SELECT romtype FROM milenabestillhotell WHERE romtype='$romtype';";
              /* $sqlSetning="SELECT romtype, antallrom, hotellnavn FROM hotellromtype WHERE romtype='$romtype';";*/


               $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente fra database");
        		   $antallRader=mysqli_num_rows($sqlResultat);


        		   if($antallRader!=0)
        		      {
        			     print(" Bestillingen er registrert fra f&oslash;r");
        			  }

        			  else
        			  {
                  $sqlSetning4="INSERT INTO milenabestillhotell (brukernavn) VALUES ('$brukernavn');";
                  $sqlSetning="INSERT INTO milenabestillhotell (romtype) VALUES ('$romtype');";
                  $sqlSetning2="INSERT INTO milenabestillhotell (datoFra) VALUES ('$datoFra');";
        			    $sqlSetning3="INSERT INTO milenabestillhotell (datoTil) VALUES ('$datoTil');";


                  mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere i database");

                        print("F&oslash;lgende bestilling er n&aring; registrert: </br>
                        Romtype $romtype </br>
                        Fra dato $datoFra </br>
                        Til dato $datoTil </br>");
        			  }
        	     }
        }
        }



include("slutt.html");
?>
