<?php  /* innlogging  */
/*
/*  Programmet logger inn en bruker i applikasjonen
    HUSK Å BYTTE NAVN TIL INDEX.PHP!
*/
?>

<h3>Innlogging </h3>

<form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
  Brukernavn <input name="brukernavn" type="text" id="brukernavn"> <br />
  Passord <input name="passord" type="password" id="passord"  >  <br />
  <input type="submit" name="logginnKnapp" value="Logg inn">
  <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>

Ny bruker ? <br />
<a href="index.php">Registrer deg her</a> <br /> <br />

<?php
  if (isset($_POST ["logginnKnapp"]))
    {
      include("2-2-sjekk.php");

      $brukernavn=$_POST ["brukernavn"];
      $passord=$_POST["passord"];

      if(!sjekkBrukernavnPassord($brukernavn,$passord))
      {
        print("Feil brukernavn/passord.");
      }

      else //Hvis koden kommer så langt er brukernavn/pw korrekt
      {
        session_start();
        $_SESSION["brukernavn"]=$brukernavn;
        print ("<meta http-equiv='refresh' content='0;url=3-1-brukerfunksjoner-hoved.php'>");
      }

    }
?>
