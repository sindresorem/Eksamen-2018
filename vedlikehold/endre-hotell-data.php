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

      <li><a href="registrer-hotell.php"> Registrer hotell </a></li>
      <li><a href="vis-hotell-data.php"> Vis data </a></li>
      <li><a href="endre-hotell-data.php"> Endre data </a></li>
      <li><a href="slett-hotell-data.php"> Slett data </a></li>

    </ul>

    <h2>Endre hotell</h2>

    <form method="post" action="" id="finnHotell" name="finnHotell">
      Hotell
      <select name="brukernavn" id="brukernavn" required>
        <option value="">Velg hotell</option>
        <?php include("dynamiske-funksjoner.php"); listeboksHotell(); ?>
      </select>  <br/>
      <input type="submit"  value="Finn hotell" name="finnHotellKnapp" id="finnHotellKnapp">
      <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
    </form>

    <?php
   if(isset($_POST ["finnHotellKnapp"]))
     {
       //$hotellnavn=$_POST ["hotellnavn"];


       include("database-tilkobling.php");

       $sqlSetning="SELECT * FROM hotell;";
       $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

       $rad=mysqli_fetch_array($sqlResultat);

       $hotellnavn=$rad["hotellnavn"];
       $sted=$rad["sted"];

       print ("<form method='post' action='' id='endreHotell' name='endreHotell'>");
       print ("Hotellnavn <input type='text' value='$hotellnavn' name='hotellnavn' id='hotellnavn' /> <br />");
       print ("Sted <input type='text' value='$sted' name='sted' id='sted' required /> <br />");
       print ("<input type='submit' value='Endre hotell' name='endreHotellKnapp' id='endreHotellKnapp'>");
       print ("</form>");

     }

     if (isset($_POST ["endreHotellKnapp"]))
      {
     $hotellnavn=$_POST ["hotellnavn"];
     $sted=$_POST ["sted"];


     if (!$hotellnavn || !$sted)
       {
         print ("Alle felt må fylles ut");
       }

       else
       {
         include("database-tilkobling.php");

         $sqlSetning="UPDATE hotell SET hotellnavn='$hotellnavn' , sted='$sted';";
         mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");

            print ("Hotell endret <br />");
       }
     }



    include ("slutt.php");
  }
     ?>
