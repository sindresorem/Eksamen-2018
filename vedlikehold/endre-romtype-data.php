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

    <h3>Endre romtype </h3>

      <form method="post" action="" id="finnRomType" name="finnRomType">
        Hotell
        <select name="romtype" id="romtype" required>
          <option value="">Velg romtype</option>
          <?php include("dynamiske-funksjoner.php"); listeboksRomType(); ?>
        </select>  <br/>
        <input type="submit"  value="Finn romtype" name="finnRomTypeKnapp" id="finnRomTypeKnapp">
        <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
      </form>


    <?php
    if(isset($_POST ["finnRomTypeKnapp"]))
          {

            include("database-tilkobling.php");

            $sqlSetning="SELECT * FROM romtype;";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

            $rad=mysqli_fetch_array($sqlResultat);


            $romtype=$rad["romtype"];


            print ("<form method='post' action='' id='endreRomType' name='endreRomType'>");
            print ("Romtype <input type='text' value='$romtype' name='romtype' id='romtype' required /> <br />");
            print ("<input type='submit' value='Endre romtype' name='endreRomTypeKnapp' id='endreRomTypeKnapp'>");
            print ("</form>");

          }

          if (isset($_POST ["endreRomTypeKnapp"]))
           {

          $romtype=$_POST ["romtype"];


          if (!$romtype)
            {
              print ("Alle felt må fylles ut");
            }

            else
            {
              include("database-tilkobling.php");

              $sqlSetning="UPDATE romtype SET romtype='$romtype';";
              mysqli_query($db,$sqlSetning) or die ("Ikke mulig å endre data i databasen");

                 print ("Romtype endret <br />");
            }
          }






    include ("slutt.php");
  }
     ?>
