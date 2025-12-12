<!-- Aleksandr Lukin -->
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bloc-Notes</title>
        <link rel="stylesheet" href="./style/style.css">
        <script src="scripts/script.js" defer></script>
    </head>
    <body>
        <header>
            <h1>Bloc-Note</h1>
        </header>
        <div id="actions">
            <input type="button" id="ajoutLien" value="Ajouter">
        </div>
        <br>
        <table id="affichageNotes">
            <tbody id="tbody"></tbody>
        </table>

        <form action="" name="ajout" id="formAjout" hidden>
            <table>
                <tr>
                    <td>Titre :</td>
                    <td><input type="text" id="titre"></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td><textarea maxlength="100" id="desc"></textarea></td>
                </tr>
            </table><br>
            <input type="button" id="ajoutBtn" value="Ajouter">
            <input type="button" id="annul" value="Annuler">
        </form>
    </body>
</html>
