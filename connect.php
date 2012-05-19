<?php
$sServer = 'sql10.pcextreme.nl';
$sUser = '33654dh';
$sPass = 'wegenspadenvlieg';

$rConnectie = mysql_connect( $sServer, $sUser, $sPass );
if (!$rConnectie) {
	die('Connection error: ' . mysql_error());
}

$dbselect = mysql_select_db('33654dh', $rConnectie);
if (!$dbselect) {
	die('Can\'t select database: ' . mysql_error());
}
?>
