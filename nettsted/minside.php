<?php
include("start.html");
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if (!$innloggetBruker)
{
 print("Denne siden krever innlogging <br />");
 print("<a href='logginn.php'>Logg inn</a>");
}
else
{
?>

<!DOCTYPE html>
<html lang="no">
<head>
<meta charset="utf-8">
<title>Min side</title>
</head>
<body>
<div id="boks">
<header>
<h1>Min side</h1>
</header>
<nav>
<h3>Velkommen til min side</h3>
<ul>

<br />
<li><a href=".php">Bestill hotell</a></li>
<br />
<li><a href="visHotellbestillinger.php">Vis hotellbestillinger</a></li>
<br />
<li><a href="endreHotellbestillinger.php">Endre hotellbestillinger</a></li>
<br />
<li><a href="slettHotellbestilling.php">Slett hotellbestillinger</a></li>
<br />
<br />
<br />
<br />

<h3>Utlogging</h3>
<li><a href="utlogging.php">Logg ut</a></li>
</ul>
</nav>
<article>

<?php
}
?>
