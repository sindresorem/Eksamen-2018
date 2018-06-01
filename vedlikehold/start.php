<?php

  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }
  else
  {

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PRG1100V Eksamen 2018</title>

    <script src="funksjoner.js"></script>
    <script src="validering.js"></script>
  </head>
  <body>
    <div id="boks">
      <header><h1>PRG1100V Eksamen 2018</h1></header>
      <nav>
        <ul>
          <li><a href="3-1-brukerfunksjoner-hoved.php"> Hjem </a></li>
          <link rel="stylesheet" type="text/css" href="style.css" media="screen" title="stilark"/>
        </ul>

        <div class="meny">
        <h1>Brukerfunksjoner</h1>
        <ul>
          
          <a href="registrer-data.php"> Registrer data </a></li>
          <a href="vis-data.php"> Vis data </a></li>
          <a href="endre-data.php"> Endre data </a></li>
          <a href="slett-data.php"> Slette data </a></li>
          <a href="3-2-brukerfunksjoner-utlogging.php"> Logg ut </a></li>

        </ul>

      </nav>
      <article class="">

        <?php
        }
         ?>
