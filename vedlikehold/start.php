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
    <title>Obligatorisk oppgave 2</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="funksjoner.js"></script>
    <script src="validering.js"></script>
  </head>
  <body>
    <div id="boks">
      <header><h1>Obligatorisk oppgave 2</h1></header>
      <nav>
        <ul>
          <li><a href="3-1-brukerfunksjoner-hoved.php"> Hjem </a></li>
        </ul>

        <h3>Brukerfunksjoner</h3>
        <ul>
          <li><a href="registrer-data.php"> Registre data </a></li>
          <li><a href="vis-data.php"> Vis data </a></li>
          <li><a href="endre-data.php"> Endre data </a></li>
          <li><a href="slette-data.php"> Slette data </a></li> </br></br>

          <li><a href="3-2-brukerfunksjoner-utlogging.php"> Logg ut </a></li>



        </ul>

      </nav>
      <article class="">

        <?php
        }
         ?>