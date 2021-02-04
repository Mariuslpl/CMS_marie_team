<?php

//on instancie un nouvel Objet de la classe DATABASE
$db = new Database('localhost', 'marie_team_bdd', 'marius', 'hY92RYx8fYDn17D1');

return $db->getConn();

?>
