<!-- 

AUTEUR : Aleksandr Lukin / Cowboy de la Programmation 



Le projet est un simple blocnotes

On peut ajouter des notes avec un titre, une description, des dates et une image (je pensais fallait faire un frontend aussi donc pour l'image on met juste image.png dans le json)
Afficher les notes, Modifier les note et les Supprimer


EXEMPLES DE REQUETE 

    Selectionner tout les notes :

    SELECT t.idNote, t.titre, d.descriptionNote, da.dateNote, i.imageNote
    FROM titre t
    INNER JOIN description d ON d.idNote = t.idNote
    INNER JOIN date da ON da.idNote = t.idNote
    INNER JOIN image i ON i.idNote = t.idNote
    ORDER BY da.dateNote DESC

    Cette requete recupere tous les notes en combinant plusieurs tables, elle prend le titre la description, la date et l’image 
    Elle renvoie tout les notes qui ont ses informations et classe du plus récent au plus ancien selon la date.




    Selectionner une notes par id :

    SELECT t.idNote, t.titre, d.descriptionNote, da.dateNote, i.imageNote
    FROM titre t
    LEFT JOIN description d ON d.idNote = t.idNote
    LEFT JOIN date da ON da.idNote = t.idNote
    LEFT JOIN image i ON i.idNote = t.idNote
    WHERE t.idNote = :id;

    Recupere une note specifique selon l'id dans la table titre et ajoute les informations de description, date et image depuis les autres tables. Grâce aux LEFT JOIN, elle va
    renvoyer la note même si certaines informations sont manquantes alors que le INNER JOIN non




    Ajouter une note (exemple de la description) :

    INSERT INTO description (descriptionNote, idNote) VALUES (:description, :idNote)

    Ajoute une description et l'identifiant de la note a la quelle elle apartient




    Modifier une note (exemple de la date) :
    
    UPDATE date SET dateNote = :date WHERE idNote = :id

    Met a jour la date
    



    Supprimer une note :

    DELETE FROM titre WHERE idNote = :id

    Supprime le titre d'une note







    POST :
          {
            "titre": "Note stylax",
            "description": "Description stylax,
            "date": "2025-12-12",
            "image": "image.png"
          }
    PUT :
          {
            "id": 1,
            "titre": "Note non stylax",
            "description": "Description non stylax,
            "date": "2025-12-13",
            "image": "imagejsp.png"
         }


-->
