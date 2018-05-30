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

    <h5>Brukerfunksjoner data</h5>

    <ul>

      <li><a href="registrer-hotell.php"> Registrer hotell </a></li>
      <li><a href="vis-hotell-data.php"> Vis data </a></li>
      <li><a href="endre-hotell-data.php"> Endre data </a></li>
      <li><a href="slett-hotell-data.php"> Slett data </a></li>

    </ul>

    <h2>Slett student</h2>

     <form method="post" action="" id="slettStudent" name="slettStudent" onSubmit="return bekreft()">
       Hotell
       <select name="hotellnavn" id="hotellnavn" required>
         <option value="">Velg hotell</option>
         <?php include("dynamiske-funksjoner.php"); listeboksHotell(); ?>
       </select>  <br/>
       <input type="submit" value="Slett hotell" id="slettHotellKnapp" name="slettHotellKnapp" />
     </form>


    <?php
    if(isset($_POST ["slettHotellKnapp"]))
      {
        include("database-tilkobling.php");

        $hotellnavn=$_POST ["hotellnavn"];

        $sqlSetning="DELETE FROM hotell WHERE hotellnavn='$hotellnavn';";
        mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette data fra database");

        print ("$hotellnavn er nå slettet fra db.  <BR />");

      }

    include ("slutt.php");
  }
     ?>
