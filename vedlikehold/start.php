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
          <li><a href="registrer-sted.php"> Registrer sted </a></li>
          <li><a href="hotell.php"> Hotell </a></li>
          <li><a href="hotellromtype.php"> HotellRomType </a></li>
          <li><a href="rom.php"> Rom </a></li>
          <li><a href="romtype.php"> Romtype </a></li></br>

          <li><a href="3-2-brukerfunksjoner-utlogging.php"> Logg ut </a></li>



        </ul>

      </nav>
      <article class="">

        <?php
        }
         ?>
