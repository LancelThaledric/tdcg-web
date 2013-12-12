<?php
/*
    404.php
    Page 404 quand la route donnée ne correspond pas aux routes définies.
*/

header("Status: 404 NOT FOUND", false, 404);

//render

require 'tpl/404.php';


?>