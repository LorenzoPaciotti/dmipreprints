<?php

//file_get_contents();
//fopen();
$ini_array = parse_ini_file("/home/lorenzo/uploads/set.ini");
print_r($ini_array);

//mysql
$mysql_user = $ini_array['mysql_user']; 
$mysql_pass = $ini_array['mysql_pass'];
$mysql_addr = $ini_array['mysql_addr'];

//ldap
$ldaphost = $ini_array['ldap_host'];
$ldapport = $ini_array['ldap_port'];

//RADIUS
$ip_radius_server = $ini_array['radius_ip'];
$shared_secret = $ini_array['radius_secret'];

?>
