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

    <h5>Visning av data</h5>
    <ul>

      <li><a href="vis-sted-data.php"> Vis sted </a></li>
      <li><a href="vis-hotell-data.php"> Vis hotell </a></li>
      <li><a href="vis-hotellromtype-data.php"> Vis hotellromtype </a></li>
      <li><a href="vis-rom-data.php"> Vis rom </a></li>
      <li><a href="vis-romtype-data.php"> Vis romtype </a></li>

    </ul>

    <?php

    include("database-tilkobling.php");

    $sqlSetning="SELECT * FROM hotell;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

    $antallRader=mysqli_num_rows($sqlResultat);

    print ("<h2>Registrert hotelldata</h2>");
    print ("<table border=1>");
    print ("<tr><th align=left>Hotellnavn</th> <th align=left>Sted</th></tr>");

    for ($r=1;$r<=$antallRader;$r++)
      {
        $rad=mysqli_fetch_array($sqlResultat);
        $hotellnavn=$rad["hotellnavn"];
        $sted=$rad["sted"];


        print ("<tr> <td> $hotellnavn </td> <td> $sted </td></tr>");
      }
        print ("</table>");



    include ("slutt.php");
  }
     ?>
