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
      <li><a href="registrer-sted.php"> Registrer sted </a></li>
      <li><a href="vis-sted-data.php"> Vis sted </a></li>
      <li><a href="endre-sted-data.php"> Endre sted </a></li>
      <li><a href="slett-sted-data.php"> Slett sted </a></li>

    </ul>

    <h3>Registrer hotelldata </h3>

<form method="post" action="" id="registrerStedSkjema" name="registrerStedSkjema">
  Sted <input type="text" id="sted" name="sted" required /> <br/>

  <input type="submit" value="Registrer data" id="registrerStedKnapp" name="registrerStedKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>



    <?php
      if (isset($_POST ["registrerStedKnapp"]))
        {
          $sted=$_POST ["sted"];

          if (!$sted)
           {
             print ("Alle felt må fylles ut.");
           }

           else {
             include("database-tilkobling.php"); //tilkobling til database og valg av databaser

             $sqlSetning="SELECT * FROM sted WHERE sted='$sted';";
             $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i db.");
             $antallRader=mysqli_num_rows($sqlResultat);

             if ($antallRader!=0)
             {
               print ("Stedet: $sted er allerede i bruk, vennligst velg et annet sted.");
             }

            else
            {
              include("database-tilkobling.php");
              $sqlSetning="INSERT INTO sted(sted) VALUES('$sted');";
              mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

              print ("Følgene sted er nå registrert: $sted");
            }

          }


        }

    include ("slutt.php");
  }
     ?>
