<?php

	$email = $_POST[ "email" ] ;
	$mdp = $_POST[ "mdp" ] ;
	
	require "modeles/ModeleSBAteliers.php" ;
	$client = ModeleSBAteliers::getClient( $email , $mdp ) ;
	
	if( $client !== FALSE ){
		session_start() ;
		
		$_SESSION[ "numero" ] = $client[ "numero" ] ;
		$_SESSION[ "nom" ] = $client[ "nom" ] ; 
		$_SESSION[ "prenom" ] = $client[ "prenom" ] ; 
		
		header( "Location: /sbateliers/clients/espace" );
	}
	else {
		$erreur = 'EMail ou mot de passe incorrect.' ;
		require "vues/vue-connexion.php" ;
	}

?>
