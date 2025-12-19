<!-- 

AUTEUR : Aleksandr Lukin / Cowboy de la Programmation 


JOURNAL :

Vendredi 5 decembre 2025 : Redition du document qui parle du projet

Vendredi 12 decembre 2025 : Creation de la base de données, creation des utilitaires (RecupererBody, RecupererHeader) et creation des fonctions qui selectionne tout les notes et une note par l'id

Vendredi 19 decembre 2025 : Finalisation du reste du crud : Ajouter, modifier, supprimer une note



DIFFICULTES :

Je m'en souviens pas de tout les difficultes que j'ai rencontré


Probleme de liason entre les fichiers, j'avais fais mal les require car les chemins étaient pas bons.

J'avais de la peine a faire les inner join, ca m'a prit du temps et meme quand j'avais fais une bone structure d'une requete inner join j'avais mit le meme join on pour la date et la description : 
"INNER JOIN description d ON d.idNote = t.idNote INNER JOIN date d ON d.idNote = t.idNote"
donc j'ai remplacé le "d" pour les dates par "da"

Quand je voulais selectionner une note a partir son id, L'api retournait toujours "note inexistante" quand je rentrait un bon id, je m'en souviens plus trop comment j'ai corrigé ca mais j'ai
remplacé le inner join par left join et ca a marché

Lors de la supression d'une note ca supprimait que le titre de la note mais ca gardait les autres informations comme description, image etc, j'avais oublié de faire plusieurs requetes qui suppriment
de toutes les tables.

l'api retourne erreur 500 peu n'importe quel requete sur le poste de l'ecole
-->
