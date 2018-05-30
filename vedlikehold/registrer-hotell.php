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

    <h5>Brukerfunksjoner data</h5>
    <ul>

      <li><a href="registrer-hotell.php"> Registrer hotell </a></li>
      <li><a href="vis-hotell-data.php"> Vis data </a></li>
      <li><a href="endre-hotell-data.php"> Endre data </a></li>
      <li><a href="slett-hotell-data.php"> Slett data </a></li>

    </ul>

    <h3>Registrer hotelldata </h3>

<form method="post" action="" id="registrerHotellSkjema" name="registrerHotellSkjema">
  Hotellnavn <input type="text" id="hotellnavn" name="hotellnavn" required /> <br/>
  Sted <input type="text" id="sted" name="sted" required /> <br/>

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
