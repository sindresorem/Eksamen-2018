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
          <li><a href="registrer-klasse.php"> Registrere klasse </a></li>
          <li><a href="registrer-student.php"> Registre student </a></li>
          <li><a href="Registrer-bilde.php"> Registre bilde </a></li>
          <li><a href="vis-klasse.php"> Vis klassedata </a></li>
          <li><a href="vis-klasse-med-bilde.php"> Vis klassedata med bilde </a></li>
          <li><a href="vis-student.php"> Vis studentdata</a></li>
          <li><a href="vis-alle-bilder.php"> Vis bilder</a></li>
          <li><a href="endre-klasse.php"> Endre klasse</a></li>
          <li><a href="endre-student.php"> Endre student </a></li>
          <li><a href="endre-bilde.php"> Endre bilde </a></li>
          <li><a href="slett-klasse.php"> Slette klasse </a></li>
          <li><a href="slett-student.php"> Slette student </a></li>
          <li><a href="slett-bilde.php"> Slette bilde </a></li>
          <li><a href="sok.php"> Søkefelt </a></li>
          <li><a href="3-2-brukerfunksjoner-utlogging.php"> Logg ut </a></li>



        </ul>

      </nav>
      <article class="">

        <?php
        }
         ?>
