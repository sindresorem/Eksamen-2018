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

    <script src="funksjoner.js"> </script>

    <h5>Sletting av data</h5>

    <ul>

      <li><a href="slett-sted-data.php"> Slett sted </a></li>
      <li><a href="slett-hotell-data.php"> Slett hotell </a></li>
      <li><a href="slett-hotellromtype-data.php"> Slett hotellromtype </a></li>
      <li><a href="slett-rom-data.php"> Slett rom </a></li>
      <li><a href="slett-romtype-data.php"> Slett romtype </a></li>

    </ul>

    <h2>Slett sted</h2>

     <form method="post" action="" id="slettSted" name="slettSted" onSubmit="return bekreft()">
       Hotell
       <select name="sted" id="sted" required>
         <option value="">Velg sted</option>
         <?php include("dynamiske-funksjoner.php"); listeboksSted(); ?>
       </select>  <br/>
       <input type="submit" value="Slett sted" id="slettStedKnapp" name="slettStedKnapp" />
     </form>


    <?php
    if(isset($_POST ["slettStedKnapp"]))
      {
        include("database-tilkobling.php");

        $sted=$_POST ["sted"];
        $land=$_POST ["land"];

        $sqlSetning="DELETE FROM plassering WHERE sted='$sted';";
        mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette data fra database");

        print ("$sted, $land er nå slettet fra db.  <BR />");

      }

    include ("slutt.php");
  }
     ?>
