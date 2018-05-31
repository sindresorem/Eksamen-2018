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


    <?php

    include("database-tilkobling.php");

          $sqlSetning="SELECT * FROM romtype;";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

          $antallRader=mysqli_num_rows($sqlResultat);

          print ("<h2>Registrert romtypedata</h2>");
          print ("<table border=1>");
          print ("<tr><th align=left>Romtype</th></tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);
              $romtype=$rad["romtype"];



              print ("<tr><td> $romtype </td></tr>");
            }
              print ("</table>");


    include ("slutt.php");
  }
     ?>
