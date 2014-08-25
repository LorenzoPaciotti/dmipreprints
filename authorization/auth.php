<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'impost_car.php';


function LDAPAuth($UID) {
// connessione a LDAP
    global $ldaphost, $ldapport;
    $ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    $ds = $ldapconn;
    $dn = "ou=users,dc=dmi,dc=unipg,dc=it";
    //l'utente deve avere la licenza all'uso di DMIPrePrints
    $filter = "(&(carLicense=:dmipreprints:)(uid=$UID))";
    //selezione dei campi di interesse per il ritorno
    $justthese = array("sn");

    //ricerca nell'albero LDAP
    $sr = ldap_search($ds, $dn, $filter, $justthese);
    $info = ldap_get_entries($ds, $sr);
    
    return $info;
}

//RADIUS
function RADIUSAuth($UID, $PASSWORD) {
    global $ip_radius_server, $shared_secret;
    require_once $_SERVER['DOCUMENT_ROOT'].'/dmipreprints/'.'authorization/radius.class.php';
    
    $radius = new Radius($ip_radius_server, $shared_secret);
    $result = $radius->AccessRequest($UID, $PASSWORD);
    if ($result) {
        echo 'RADIUS OK';
        return true;
    } else {
        echo 'RADIUS ERRORE';
        return false;
    }
}

?>