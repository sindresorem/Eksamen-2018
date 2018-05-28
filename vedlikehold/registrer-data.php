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

 <h3>Registrer Data</h3>

 <form method="post" action="" id="finnKnapp" name="finnKnapp" onSubmit="return validerData()">
   Datatype <select name="data" id="data">
    <option value="Hotell">Hotell</option>
    <option value="Romtype">Romtype</option>
    <option value="Hotellromtype">Hotellromtype</option>
    <option value="Rom">Rom</option>
    <?php include("dynamiske-funksjoner.php"); listeboksData(); ?>

  </select> <br />

  <input type="submit" value="Velg Data" id="finnDataKnapp" name=" finnDataKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br/>
</form>

<BR /> <BR />
<div id="melding"> </div>

<?php
  if (isset($_POST ["finnDataKnapp"]))
    {
    //  $hotell=$_POST ["hotell"];

      include("database-tilkobling.php");

      $sqlSetning="SELECT * FROM hotell WHERE hotellnavn='$hotellnavn';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra databasen");

      $antallRader=mysqli_num_rows($sqlResultat);

      for ($r=1;$r<=$antallRader;$r++)
        {
          $rad=mysqli_fetch_array($sqlResultat);

          $antallRader=mysqli_num_rows($sqlResultat);

          $hotellnavn=$rad["hotellnavn"];        

          print ("<form method='post' action='' id='endreHotell' name='endreHotell'>");
          print ("Hotellnavn <input type='text' value='' name='hotellnavn' id='hotellnavn' required /> <br />");
          print ("Sted <input type='text' value='' name='sted' id='sted'  /> <br />");
          print ("<input type='submit' value='Registrer data' name='registrerDataKnapp' id='registrerDataKnapp'>");
          print ("</form>");

          if (isset($_POST ["registrerDataKnapp"]))
          {
            $hotellnavn=$_POST ["hotellnavn"];
            $sted=$_POST ["sted"];


    if (!$hotellnavn || !$sted)

    {
      print ("Alle felt må fylles ut.");
    }

  else {
    include("database-tilkobling.php"); //tilkobling til database og valg av databaser

    $sqlSetning="SELECT * FROM hotell WHERE hotellnavn='$hotellnavn';";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i db.");
    $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader!=0)
    {
      print ("Hotellnavn er allerede i bruk, vennligst velg et annet hotellnavn.");
    }
    else
    {
      $sqlSetning="INSERT INTO hotell VALUES('$hotellnavn','$sted');";
      mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere data i databasen");

      print ("Følgene hotell er nå registrert: $hotellnavn $sted");
     }
    }
   }
  }
}
include ("slutt.php");
}
 ?>
