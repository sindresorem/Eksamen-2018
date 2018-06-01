<?php

function  listeboksHotell()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM hotell ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $sted=$rad["sted"];


    print("<option value='$hotellnavn'> $hotellnavn $sted </option>");
    }

}


function  listeboksHotellRomType()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM hotellromtype ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $romtype=$rad["romtype"];
    $antallrom=$rad["antallrom"];


    print("<option value='$hotellnavn'> $hotellnavn $romtype $antallrom </option>");
    }

}




function  listeboksRom()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM rom ORDER BY hotellnavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $hotellnavn=$rad["hotellnavn"];
    $romtype=$rad["romtype"];
    $romnr=$rad["romnr"];


    print("<option value='$hotellnavn'> $hotellnavn $romtype $romnr </option>");
    }

}

function  listeboksRomType()
{
  include("database-tilkobling.php");

  $sqlSetning="SELECT * FROM romtype ORDER BY romtype;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $romtype=$rad["romtype"];

    print("<option value='$romtype'> $romtype</option>");
    }

}


function  listeboksSted()
{
  include("database-tilkobling.php");


  $sqlSetning="SELECT * FROM plassering ORDER BY sted;";

  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente data fra database");

  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $sted=$rad["sted"];
    $land=$rad["land"];



    print("<option value='$sted'>$sted $land</option>");
    }

}
