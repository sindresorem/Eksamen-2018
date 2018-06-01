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

    <h5>Endring av data</h5>
    <ul>
      <li><a href="endre-sted-data.php"> Endre sted </a></li>
      <li><a href="endre-hotell-data.php"> Endre hotell </a></li>
      <li><a href="endre-hotellromtype-data.php"> Endre hotellromtype </a></li>
      <li><a href="endre-rom-data.php"> Endre rom </a></li>
      <li><a href="endre-romtype-data.php"> Endre romtype </a></li>

    </ul>

    <h3>Endre sted</h3>

    <form method="post" action="" id="finnSted" name="finnSted">
      Sted
      <select name="sted" id="sted" required>
        <option value="">Velg sted</option>
        <?php include("dynamiske-funksjoner.php"); listeboksSted(); ?>
      </select>  <br/>
      <input type="submit"  value="Finn sted" name="finnStedKnapp" id="finnStedKnapp">
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>

    <?php
   if(isset($_POST ["finnStedKnapp"]))
     {
       //$hotellnavn=$_POST ["hotellnavn"];


       include("database-tilkobling.php");

       $sqlSetning="SELECT * FROM plassering;";
       $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

       $rad=mysqli_fetch_array($sqlResultat);

       $sted=$rad["sted"];
       $land=$rad["land"];

       print ("<form method='post' action='' id='endreSted' name='endreSted'>");
       print ("Sted <input type='text' value='$sted' name='sted' id='sted' /> <br />");
       print ("Land <input type='text' value='$land' name='land' id='land' required /> <br />");
       print ("<input type='submit' value='Endre sted' name='endreStedKnapp' id='endreStedKnapp'>");
       print ("</form>");

     }

     if (isset($_POST ["endreStedKnapp"]))
      {
     $sted=$_POST ["sted"];
     $land=$_POST ["land"];


     if (!$sted || !$land)
       {
         print ("Alle felt må fylles ut");
       }

       else
       {
         include("database-tilkobling.php");

         $sqlSetning="UPDATE plassering SET sted='$sted' , land='$land';";
         mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");

            print ("Sted endret <br />");
       }
     }



    include ("slutt.php");
  }
     ?>
