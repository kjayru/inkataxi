<?php


if ( file_exists( 'servicio_offline_enable.php' ) && !isset( $_GET['mbadmin'] ) ) {
	include( 'servicio_offline_enable.php' );
	exit;
}

ob_start();

require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'seguridad/functions.php' );


?>