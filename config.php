<?php

#--------- MySQL nustatymai
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'l2jdb';

mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die (mysql_error());
mysql_select_db($mysql_db);   

#--------- Kiti nustatymai
/*
* Nustatymu paaiskinimai
* 
* 0 - isjungta, 1 - ijungta
*
* show_rb_id - raidboss ID rodymo ijungimas / isjungimas
* show_rb_foto - raidboss foto rodymo ijungimas / isjungimas
* show_drop - raidboss drop'o rodymo ijungimas / isjungimas
* show_drop_min_max - drop'o min. max. (kiek minimaliai ir maksimaliai gali ismesti kazkokiu daiktu) ijungimas / isjungimas
* map_size - kiek sumazinti zemelapi procentais (0 - pilnas zemelapis)
*/
$config = array(
	'show_rb_id' => 1,
	'show_rb_foto' => 0,
	'show_drop' => 1,
	'show_drop_min_max' => 1,
	'map_size' => 0
);

?>