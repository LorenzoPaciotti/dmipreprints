<?php

function LDAPAuth($UID) {

// variabili connessione LDAP DA STORARE SU CONF
    $ldaphost = "192.168.158.128";  // indirizzo host LDAP
    $ldapport = 389;                // porta su host LDAP
    //
    //
// connessione a LDAP
    $ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

    //TEST
    $ds = $ldapconn;
    $dn = "ou=users,dc=dmi,dc=unipg,dc=it";
    //$filter = "(|(sn=$person*)(givenname=$person*))"; ESEMPIO
    //l'utente deve avere la licenza all'uso di DMIPrePrints
    $filter = "(&(carLicense=:dmipreprints:)(uid=$UID))";
    $justthese = array("ou", "sn", "givenname", "mail");

    $sr = ldap_search($ds, $dn, $filter, $justthese);

    $info = ldap_get_entries($ds, $sr);
    echo $info["count"] . " OK!\n";
    
    if($info["count"] == 1){
        return true;
    }

    //ENDTEST


    return false;
}

//RADIUS TEST
//radius_add_server();
?>