<?php
// AUTEUR : Aleksandr Lukin / Cowboy de la Programmation


require_once('../config/database.php');


// Selection de tout les notes pour pouvoir les afficher
function selectionnerTousLesNotes() : array
{
    $pdo = connexionBdd();
    $sql = 'SELECT t.idNote, t.titre, d.descriptionNote, da.dateNote, i.imageNote FROM titre t INNER JOIN description d ON d.idNote = t.idNote INNER JOIN date da ON da.idNote = t.idNote INNER JOIN image i ON i.idNote = t.idNote ORDER BY da.dateNote DESC';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}

// Selection de tout les notes par leur id , pour savoir si une note existe ou pas
function selectionnerUneNoteParIdentifiant(int $id) : array|false
{
    $pdo = connexionBdd();
    $sql = 'SELECT t.idNote, t.titre, d.descriptionNote, da.dateNote, i.imageNote FROM titre t LEFT JOIN description d ON d.idNote = t.idNote LEFT JOIN date da ON da.idNote = t.idNote LEFT JOIN image i ON i.idNote = t.idNote WHERE t.idNote = :id;';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch();
}


// Ajout d'une note
function insererNote(string $titre, string $description, string $date, string $image) : void
{
    $pdo = connexionBdd();
    $pdo->beginTransaction();

    $sql = 'INSERT INTO titre (titre) VALUES (:titre)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':titre' => $titre
    ]);

    $idNote = $pdo->lastInsertId();

    $sql = 'INSERT INTO description (descriptionNote, idNote) VALUES (:description, :idNote)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':description' => $description,
        ':idNote' => $idNote
    ]);

    $sql = 'INSERT INTO date (dateNote, idNote) VALUES (:date, :idNote)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':date' => $date,
        ':idNote' => $idNote
    ]);

    $sql = 'INSERT INTO image (imageNote, idNote) VALUES (:image, :idNote)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':image' => $image,
        ':idNote' => $idNote
    ]);

    $pdo->commit();
}

// Modification d'une note
function modifierNote(string $titre, string $description, string $date, string $image, int $id) : void
{
    $pdo = connexionBdd();
    $pdo->beginTransaction();

    $sql = 'UPDATE titre SET titre = :titre WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':titre' => $titre,
        ':id' => $id
    ]);

    $sql = 'UPDATE description SET descriptionNote = :description WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':description' => $description,
        ':id' => $id
    ]);

    $sql = 'UPDATE date SET dateNote = :date WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':date' => $date,
        ':id' => $id
    ]);

    $sql = 'UPDATE image SET imageNote = :image WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':image' => $image,
        ':id' => $id
    ]);

    $pdo->commit();
}

// Suppresion d'une note
function supprimerNote(int $id) : void
{
    $pdo = connexionBdd();
    $pdo->beginTransaction();

    $sql = 'DELETE FROM description WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    $sql = 'DELETE FROM date WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    $sql = 'DELETE FROM image WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    $sql = 'DELETE FROM titre WHERE idNote = :id';
    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    $pdo->commit();
}
