<?php
require '../BlocNoteAPI/fonctionsApi/notes.php';
require '../BlocNoteAPI/fonctionsApi/utilitaires.php';

$typeRequete = $_SERVER["REQUEST_METHOD"];

switch ($typeRequete) {
    case "GET":
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id === null) {
            $donnees = selectionnerTousLesNotes();
            EnvoyerDonnees($donnees, 200);
        }

        if ($id === false) {
            $erreur["id"] = "id invalide";
            EnvoyerDonnees($erreur, 400);
        }

        $donnees = selectionnerUneNoteParIdentifiant($id);

        if ($donnees === false) {
            $erreur["erreur"] = "Note inexistante";
            EnvoyerDonnees($erreur, 404);
        }

        EnvoyerDonnees($donnees, 200);
        break;
    case "POST":
        $data = RecupererBody();

        $titre = isset($data["titre"]) ? $data["titre"] : null;
        $description = isset($data["description"]) ? $data["description"] : null;
        $date = isset($data["date"]) ? $data["date"] : null;
        $image = isset($data["image"]) ? $data["image"] : null;
        $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : null;

        if ($titre === null || $description === null || $date === null || $id === null) {
            $erreur["erreur"] = "Variables non definies";
            EnvoyerDonnees($erreur, 400);
        }

        insererNote($titre, $description, $date, $image, $id);
        $donnees["message"] = "Note cree";
        EnvoyerDonnees($donnees, 201);
        break;
    case "PUT":
        $data = RecupererBody();

        $titre = isset($data["titre"]) ? $data["titre"] : null;
        $description = isset($data["description"]) ? $data["description"] : null;
        $date = isset($data["date"]) ? $data["date"] : null;
        $image = isset($data["image"]) ? $data["image"] : null;
        $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : null;

        if ($titre === null || $description === null || $date === null || $id === null) {
            $erreur["erreur"] = "Variables non definies";
            EnvoyerDonnees($erreur, 400);
        }

        modifierNote($titre, $description, $date, $image, $id);
        $donnees["message"] = "Note modifié";
        EnvoyerDonnees($donnees, 201);
        break;
    case "DELETE":
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            
        if ($id === null) {
            $erreur["erreur"] = "Variables non definies";
            EnvoyerDonnees($erreur, 400);
        }
            
        $donnees = selectionnerUneNoteParIdentifiant($id);

        if($donnees === false)
        {
            $erreur["erreur"] = "Note inexistante";
            EnvoyerDonnees($erreur, 404);
        }

        supprimerNote($id);
        $donnees["message"] =  "Note supprime";
        EnvoyerDonnees($donnees, 200);
        break;
}
