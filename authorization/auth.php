<?php
require_once getcwd().'/../impost_car.php';
function LDAPAuth($UID) {
// connessione a LDAP
    global $ldaphost, $ldapport;
    $ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    $ds = $ldapconn;
    $dn = "ou=users,dc=dmi,dc=unipg,dc=it";
    //l'utente deve avere la licenza all'uso di DMIPrePrints
    $filter = "(&(carLicense=:dmipreprints:)(uid=$UID))";
    //selezione dei campi di interesse
    $justthese = array("sn", "mail");

    //ricerca nell'albero LDAP
    $sr = ldap_search($ds, $dn, $filter, $justthese);

    //restituzione risultato, solo se il conteggio dei match è 1 torna TRUE
    $info = ldap_get_entries($ds, $sr);
    return $info;
    /*
    if ($info["count"] == 1) {
        return $info;
    }
     * */
}

//RADIUS
function RADIUSAuth($UID, $PASSWORD) {

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