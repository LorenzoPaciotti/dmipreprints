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
    $ds = $ldapconn;
    $dn = "ou=users,dc=dmi,dc=unipg,dc=it";
    //l'utente deve avere la licenza all'uso di DMIPrePrints
    $filter = "(&(carLicense=:dmipreprints:)(uid=$UID))";
    //selezione dei campi di interesse
    $justthese = array("ou", "sn", "givenname", "mail");

    //ricerca nell'albero LDAP
    $sr = ldap_search($ds, $dn, $filter, $justthese);

    //restituzione risultato, solo se il conteggio dei match è 1 torna TRUE
    $info = ldap_get_entries($ds, $sr);
    if ($info["count"] == 1) {
        echo $info["count"] . " LDAP OK! \n";
        return true;
    }

    //tutti gli altri casi
    return false;
}

//RADIUS
function RADIUSAuth($UID, $PASSWORD) {
    
    //DA METTERE SUL CONF
    $ip_radius_server = "192.168.158.128";
    $shared_secret = "boh";
    
    $username = $UID;
    $password = $PASSWORD;
    require_once('radius.class.php');
    $radius = new Radius($ip_radius_server, $shared_secret);
    $result = $radius->AccessRequest($username, $password);
    if ($result) {
        echo 'RADIUS OK';
        return true;
    } else {
        echo 'RADIUS ERRORE';
        return false;
    }
}

?>