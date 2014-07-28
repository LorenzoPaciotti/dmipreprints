<?php

//SCRIPT AUTENTICAZIONE LDAP
// variabili connessione LDAP
$ldaphost = "192.168.141.128";  // your ldap servers
$ldapport = 389;                 // your ldap server's port number

// connessione a LDAP
$ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

// binding a LDAP -- test admin
$ldaprdn = "cn=admin,dc=dmi,dc=unipg,dc=it";     // ldap rdn or dn
$ldappass = "admin";  // associated password
if ($ldapconn) {

    // binding
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verifica binding dell'admin
    if ($ldapbind) {
        echo "LDAP bind a admin</br></br>";
    } else {
        echo "LDAP bind failed...";
    }
}

//LDAP SEARCH
if ($ldapconn) {
    //$ldapbind = @ldap_bind($ldapconn, $ldapuser.$domain, $ldappass);
    $base_dn = "dc=dmi,dc=unipg,dc=it";
    //$filter='(&(objectClass=inetOrgPerson)(uid=rz690001asd))';
    $filter = "(uid=testwrong)";
    
    //$filter = "uid=rz690001";
    if ($ldapbind) {
        //$ris1 = ldap_search($ldapbind, $base_dn, $filter);
        $ris2 = ldap_search($ldapconn, $base_dn, $filter);
        //print_r("ris1: ".$ris1."</br>");
        print_r("ris2: ".$ris2."</br>");
        //print_r(ldap_error($ldapconn));
    }
}

//RADIUS TEST
//radius_add_server();
?>