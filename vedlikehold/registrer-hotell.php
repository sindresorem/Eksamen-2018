<?php
  session_start();
  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }
  else
  {
    include ("start.php");

    ?>

    <h5>Registrering av data</h5>
    <ul>

      <li><a href="registrer-sted.php"> Registrer sted </a></li>
      <li><a href="registrer-hotell.php"> Registrer hotell </a></li>
      <li><a href="registrer-hotellromtype.php"> Registrer hotellromtype </a></li>
      <li><a href="registrer-rom.php"> Registrer rom </a></li>
      <li><a href="registrer-romtype.php"> Registrer romtype </a></li>

    </ul>

    <h3>Registrer hotelldata </h3>

<form method="post" action="" id="registrerHotellSkjema" name="registrerHotellSkjema">
  Hotellnavn <input type="text" id="hotellnavn" name="hotellnavn" required /> <br/>
  Velg sted  <select name="sted" id="sted" required>
    <option value="">Velg sted</option>
    <?php include("dynamiske-funksjoner.php"); listeboksRomType(); ?>
  </select>  <br/>
  <input type="submit" value="Registrer data" id="registrerHotellKnapp" name="registrerHotellKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>



    <?php
      if (isset($_POST ["registrerHotellKnapp"]))
        {
          $hotellnavn=$_POST ["hotellnavn"];
          $sted=$_POST ["sted"];

          if (!$hotellnavn || !$sted)
           {
             print ("Alle felt må fylles ut.");
           }

            else
            {
              include("database-tilkobling.php");
              $sqlSetning="INSERT INTO hotell(hotellnavn,sted) VALUES('$hotellnavn','$sted');";
              mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

              print ("Følgene hotell er nå registrert: $hotellnavn $sted");
            }


        }

    include ("slutt.php");
  }
     ?>
