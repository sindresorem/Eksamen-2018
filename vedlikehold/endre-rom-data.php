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

    <h3>Endre rom </h3>

    <form method="post" action="" id="finnRom" name="finnRom">
      Hotell
      <select name="brukernavn" id="brukernavn" required>
        <option value="">Velg rom</option>
        <?php include("dynamiske-funksjoner.php"); listeboksRom(); ?>
      </select>  <br/>
      <input type="submit"  value="Finn rom" name="finnRomKnapp" id="finnRomKnapp">
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>



    <?php
    if(isset($_POST ["finnRomKnapp"]))
      {

        include("database-tilkobling.php");

        $sqlSetning="SELECT * FROM rom;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

        $rad=mysqli_fetch_array($sqlResultat);

        $hotellnavn=$rad["hotellnavn"];
        $romtype=$rad["romtype"];
        $romnr=$rad["romnr"];

        print ("<form method='post' action='' id='endreHotell' name='endreHotell'>");
        print ("Hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' /> <br />");
        print ("Romtype <input type='text' value='$romtype' name='romtype' id='romtype' required /> <br />");
        print ("Romnr <input type='text' value='$romnr' name='romnr' id='romnr' required /> <br />");
        print ("<input type='submit' value='Endre rom' name='endreRomKnapp' id='endreRomKnapp'>");
        print ("</form>");

      }

      if (isset($_POST ["endreRomKnapp"]))
       {

      $hotellnavn=$_POST ["hotellnavn"];
      $romtype=$_POST ["romtype"];
      $romnr=$_POST ["romnr"];


      if (!$hotellnavn || !$romtype || !$romnr)
        {
          print ("Alle felt må fylles ut");
        }

        else
        {
          include("database-tilkobling.php");

          $sqlSetning="UPDATE rom SET hotellnavn='$hotellnavn' , romtype='$romtype' , romnr='$romnr';";
          mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");

             print ("Rom endret <br />");
        }
      }




    include ("slutt.php");
  }
     ?>
