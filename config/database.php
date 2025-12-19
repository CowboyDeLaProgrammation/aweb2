<?php
// AUTEUR : Aleksandr Lukin / Cowboy de la Programmation

require_once ('../api/constantes.php');

//Initialise et retourne la connection à la base de données
function connexionBdd() : PDO
{
	static $pdo = null;

	if ($pdo === null) {
		$dsn = 'mysql:host=' . BDD_HOTE . ';dbname=' . BDD_NOM . ';charset=' . BDD_CHARSET;
		$options = [
		    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES => false,
		];
		$pdo = new PDO($dsn, BDD_UTILISATEUR, BDD_MOT_DE_PASSE, $options);
	}
	return $pdo;
}