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

    <h3>Registrer sted </h3>

<form method="post" action="" id="registrerStedSkjema" name="registrerStedSkjema">
  Sted <input type="text" id="sted" name="sted" required /> <br/>
  Land <input type="text" id="land" name="land" required /> <br/>

  <input type="submit" value="Registrer data" id="registrerStedKnapp" name="registrerStedKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>



    <?php
      if (isset($_POST ["registrerStedKnapp"]))
        {
          $sted=$_POST ["sted"];
          $land=$_POST ["land"];

          if (!$sted || !$land)
           {
             print ("Alle felt må fylles ut.");
           }

          else {
             include("database-tilkobling.php"); //tilkobling til database og valg av databaser

             $sqlSetning="SELECT * FROM plassering WHERE land='$land';";

             $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i db.");
             $antallRader=mysqli_num_rows($sqlResultat);

             if ($antallRader!=0)
             {
               print ("$land er allerede i bruk, vennligst velg et annet sted.");
             }

            else
            {
              include("database-tilkobling.php");

              $sqlSetning="INSERT INTO plassering(sted,land) VALUES('$sted','$land');";

              mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

              print ("Følgene sted er nå registrert: $land, $sted");
            }

          }

        }


    include ("slutt.php");
  }
     ?>
