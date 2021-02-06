<?php

//on instancie un nouvel Objet de la classe DATABASE
$db = new Database('localhost', 'cms_marie_team', 'root', '');

return $db->getConn();

?>
