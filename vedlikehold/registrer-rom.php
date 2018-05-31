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

    <h3>Registrer rom </h3>

<form method="post" action="" id="registrerRomSkjema" name="registrerRomSkjema">
  Hotellnavn <input type="text" id="hotellnavn" name="hotellnavn" required /> <br/>
  Romtype <input type="text" id="romtype" name="romtype" required /> <br/>
  Romnr <input type="text" id="romnr" name="romnr" required /> <br/>

  <input type="submit" value="Registrer data" id="registrerRomKnapp" name="registrerRomKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>



    <?php
      if (isset($_POST ["registrerRomKnapp"]))
        {
          $hotellnavn=$_POST ["hotellnavn"];
          $romtype=$_POST ["romtype"];
          $rom=$_POST ["rom"];


          if (!$hotellnavn || !$romtype || !$rom)
           {
             print ("Alle felt må fylles ut.");
           }

            else
            {
              include("database-tilkobling.php");
              $sqlSetning="INSERT INTO rom(hotellnavn,romtype,rom) VALUES('$hotellnavn','$romtype','$rom');";
              mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

              print ("Følgene hotell er nå registrert: $hotellnavn $romtype $rom");
            }


        }

    include ("slutt.php");
  }
     ?>
