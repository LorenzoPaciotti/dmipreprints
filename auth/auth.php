<?php

function LDAPAuth($UID) {

    $auth_result = false;

// variabili connessione LDAP
    $ldaphost = "192.168.141.130";  // your ldap servers
    $ldapport = 389;                 // your ldap server's port number
// connessione a LDAP
    $ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

    //TEST
    $ds = $ldapconn;
    $dn = "dc=dmi,dc=unipg,dc=it";
    //$filter = "(|(sn=$person*)(givenname=$person*))"; ESEMPIO
    $filter = "cn=" . $UID;
    $justthese = array("ou", "sn", "givenname", "mail");

    $sr = ldap_search($ds, $dn, $filter, $justthese);

    $info = ldap_get_entries($ds, $sr);

    echo $info["count"] . " entries returned\n";

    //ENDTEST


    return $auth_result;
}

//RADIUS TEST
//radius_add_server();
?>