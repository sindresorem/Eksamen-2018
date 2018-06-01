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

    <h5>Sletting av data</h5>
    <ul>

      <li><a href="slett-sted-data.php"> Slett sted </a></li>
      <li><a href="slett-hotell-data.php"> Slett hotell </a></li>
      <li><a href="slett-hotellromtype-data.php"> Slett hotellromtype </a></li>
      <li><a href="slett-rom-data.php"> Slett rom </a></li>
      <li><a href="slett-romtype-data.php"> Slett romtype </a></li>

    </ul>

    <h2>Slett romtype</h2>

         <form method="post" action="" id="slettRomType" name="slettRomType" onSubmit="return bekreft()">
           Hotell
           <select name="romtype" id="romtype" required>
             <option value="">Velg romtype</option>
             <?php include("dynamiske-funksjoner.php"); listeboksRomType(); ?>
           </select>  <br/>
           <input type="submit" value="Slett rom" id="slettRomTypeKnapp" name="slettRomTypeKnapp" />
         </form>



    <?php
      if(isset($_POST ["slettRomTypeKnapp"]))
          {
            include("database-tilkobling.php");

            $romtype=$_POST ["romtype"];

            $sqlSetning="DELETE FROM romtype WHERE romtype='$romtype';";
            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette data fra database");

            print ("$romtype er nå slettet fra db.  <BR />");

          }

        include ("slutt.php");
      }



     ?>
