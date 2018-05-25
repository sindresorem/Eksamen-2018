<?php

  @$innloggetBruker=$_SESSION["brukernavn"];

  if(!$innloggetBruker) //bruker er ikke innlogget
  {
    print("Denne siden krever innlogging.");
  }
  else
  {

 ?>

</article>
<br class="clearfloat"/>  <!-- Avslutter float-->
<footer>Laget av Sindre Sørem </br></footer>
</div>
</body>
</html>

<?php
}
 ?>
