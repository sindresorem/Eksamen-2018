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

    <h3>Endre hotellromtype</h3>

    <form method="post" action="" id="finnHotellRomType" name="finnHotellRomType">
      Hotellromtype
      <select name="brukernavn" id="brukernavn" required>
        <option value="">Velg hotellromtype</option>
        <?php include("dynamiske-funksjoner.php"); listeboksHotellRomType(); ?>
      </select>  <br/>
      <input type="submit"  value="Finn hotell" name="finnHotellRomTypeKnapp" id="finnHotellRomTypeKnapp">
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>

        <?php

        if(isset($_POST ["finnHotellRomTypeKnapp"]))
          {

           include("database-tilkobling.php");

           $sqlSetning="SELECT * FROM hotellromtype;";
           $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

           $rad=mysqli_fetch_array($sqlResultat);

           $hotellnavn=$rad["hotellnavn"];
           $romtype=$rad["romtype"];
           $antallrom=$rad["antallrom"];

           print ("<form method='post' action='' id='endreHotell' name='endreHotell'>");
           print ("Hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' /> <br />");
           print ("Romtype <input type='text' value='$romtype' name='romtype' id='romtype' required /> <br />");
           print ("Antall rom <input type='text' value='$antallrom' name='antallrom' id='antallrom' required /> <br />");
           print ("<input type='submit' value='Endre hotellromtype' name='endreHotellRomTypeKnapp' id='endreHotellRomTypeKnapp'>");
           print ("</form>");

         }

         if (isset($_POST ["endreHotellRomTypeKnapp"]))
          {
          $hotellnavn=$_POST ["hotellnavn"];
          $romtype=$_POST["romtype"];
          $antallrom=$_POST["antallrom"];


         if (!$hotellnavn || !$romtype || !$antallrom)
           {
           print ("Alle felt må fylles ut");
           }

           else
           {
             include("database-tilkobling.php");

             $sqlSetning="UPDATE hotellromtype SET hotellnavn='$hotellnavn' , romtype='$romtype' , antallrom='$antallrom';";
             mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");

                print ("Hotellromtype endret <br />");
           }
         }




    include ("slutt.php");
  }
     ?>
