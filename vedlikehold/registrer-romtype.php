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

      <li><a href="registrer-romtype.php"> Registrer romtype </a></li>
      <li><a href="vis-romtype-data.php"> Vis data </a></li>
      <li><a href="endre-romtype-data.php"> Endre data </a></li>
      <li><a href="slett-romtype-data.php"> Slett data </a></li>

    </ul>

    <h3>Registrer rom </h3>

    <form method="post" action="" id="registrerRomTypeSkjema" name="registrerRomTypeSkjema">
      Romtype <input type="text" id="romtype" name="romtype" required /> <br/>

      <input type="submit" value="Registrer data" id="registrerRomTypeKnapp" name="registrerRomTypeKnapp" />
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>



    <?php

    if (isset($_POST ["registrerRomTypeKnapp"]))
      {
        $romtype=$_POST ["romtype"];



        if (!$romtype)
         {
           print ("Alle felt må fylles ut.");
         }

         else {
           include("database-tilkobling.php"); //tilkobling til database og valg av databaser

           $sqlSetning="SELECT * FROM romtype WHERE romtype='$romtype';";
           $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i db.");
           $antallRader=mysqli_num_rows($sqlResultat);

           if ($antallRader!=0)
           {
             print ("Romtype: $romtype er allerede i bruk, vennligst velg en annen romtype.");
           }

          else
          {
            include("database-tilkobling.php");
            $sqlSetning="INSERT INTO romtype(romtype) VALUES('$romtype');";
            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

            print ("Følgene romtype er nå registrert: $romtype");
          }

        }
      }


    include ("slutt.php");
  }
     ?>
