<?php
// AUTEUR : Aleksandr Lukin / Cowboy de la Programmation

function RecupererBody() {
	$contenu = file_get_contents("php://input");


	if ($contenu === false) {
	    return [];
	}

	$donnees = json_decode($contenu, true);

	if (!is_array($donnees)) {
	    return [];
	}

	return $donnees;
}

function RecupererHeader() {
	$entetes = getallheaders();

	if (!array_key_exists('Authorization', $entetes)) {
	    return false;
	}

	$bearer = explode(' ', $entetes['Authorization']);

	if ($bearer[0] === 'Bearer') {
	    return $bearer[1];
	}

	return false;
}

// Envoi des données selon l'action avec un code http
function EnvoyerDonnees($donnees, $codeHTTP) {
	http_response_code($codeHTTP);
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($donnees);
	die();
}




