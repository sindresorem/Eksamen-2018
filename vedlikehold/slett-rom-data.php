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

    <h2>Slett rom</h2>

     <form method="post" action="" id="slettRom" name="slettRom" onSubmit="return bekreft()">
       Hotell
       <select name="hotellnavn" id="hotellnavn" required>
         <option value="">Velg rom</option>
         <?php include("dynamiske-funksjoner.php"); listeboksRom(); ?>
       </select>  <br/>
       <input type="submit" value="Slett rom" id="slettRomKnapp" name="slettRomKnapp" />
     </form>


    <?php
    if(isset($_POST ["slettRomKnapp"]))
      {
        include("database-tilkobling.php");

        $hotellnavn=$_POST ["hotellnavn"];

        $sqlSetning="DELETE FROM rom WHERE hotellnavn='$hotellnavn';";
        mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette data fra database");

        print ("$hotellnavn er nå slettet fra db.  <BR />");

      }

    include ("slutt.php");
  }
     ?>
