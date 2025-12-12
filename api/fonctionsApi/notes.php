<?php

// Selection de tout les notes pour pouvoir les afficher
function selectionnerTousLesNotes() : array
{
	$pdo = connexionBdd();
    $sql = 'SELECT  FROM BlocNote';
	$statement = $pdo->prepare($sql);
	$statement->execute();
	return $statement->fetchAll();
}

// Selection de tout les notes par leur id , pour savoir si une note existe ou pas
function selectionnerUneNoteParIdentifiant(int $id) : array | false
{
	$pdo = connexionBdd();
    $sql = 'SELECT idNote, FROM BlocNote WHERE id = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch();
}

// Ajout d'une note
function insererNote(string $titre, string $description, int $date, int $image, int $id) : void
{
	$pdo = connexionBdd();
    $sql = "INSERT INTO  () VALUES (:titre, :description, :date, :image, :id)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':titre' => $titre,
        ':description' => $description,
        ':date' => $date,
		':image' => $image,
		':id'=> $id
    ]);
}

// Modification d'une note
function modifierNote(string $titre, string $description, int $date, int $image, int $id) : void
{
	$pdo = connexionBdd();
    $sql = "UPDATE  SET titre = :titre, description = :description, date = :date, image = :image, id = :id WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':titre' => $titre,
        ':description' => $description,
        ':date' => $date,
		':image' => $image,
		':id'=> $id
    ]);
}

// Suppresion d'une note
function supprimerNote(int $id) : void
{
	$pdo = connexionBdd();
    $sql = 'DELETE FROM  WHERE id = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':id' => $id
    ]);
}