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

      <h3>Registrer hotellromtypedata </h3>

    <form method="post" action="" id="registrerHotellRomtypeSkjema" name="registrerHotellRomtypeSkjema">
      Hotellnavn <input type="text" id="hotellnavn" name="hotellnavn" required /> <br/>
      Romtype <input type="text" id="romtype" name="romtype" required /> <br/>
      Antall rom <input type="text" id="antallrom" name="antallrom" required /> <br/>

      <input type="submit" value="Registrer data" id="registrerHotellRomtypeKnapp" name="registrerHotellRomtypeKnapp" />
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>


        <?php
          if (isset($_POST ["registrerHotellRomtypeKnapp"]))
            {
              $hotellnavn=$_POST ["hotellnavn"];
              $romtype=$_POST ["romtype"];
              $antallrom=$_POST ["antallrom"];

              if (!$hotellnavn || !$romtype || !$antallrom)
               {
                 print ("Alle felt må fylles ut.");
               }

                else
                {
                  include("database-tilkobling.php");
                  $sqlSetning="INSERT INTO hotellromtype(hotellnavn,romtype,antallrom) VALUES('$hotellnavn','$romtype','$antallrom');";
                  mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

                  print ("Følgene hotellromtype er nå registrert: $hotellnavn $romtype $antallrom");
                }


            }

    include ("slutt.php");
  }
     ?>
