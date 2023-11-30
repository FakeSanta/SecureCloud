<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editeur de Fichiers</title>
    <!-- Inclure les fichiers CSS et JavaScript de CodeMirror -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.68.0/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.68.0/codemirror.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.68.0/mode/shell/shell.js"></script>
</head>
<body>
    <textarea id="editor">{{ $output }}</textarea>
    <button onclick="saveFile()">Enregistrer</button>

    <script>
        // Initialiser l'éditeur CodeMirror
        var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
            lineNumbers: true,
            mode: "shell"
        });

        // Charger le contenu du fichier dans l'éditeur
        // Ceci est un exemple, vous devez implémenter le chargement du contenu du fichier selon vos besoins.
        // Peut-être via une autre requête AJAX.
        editor.setValue("Contenu du fichier ici");

        // Fonction pour enregistrer le contenu du fichier
        function saveFile() {
            var content = editor.getValue();

            // Envoyer le contenu du fichier au backend via une requête AJAX
            fetch('index.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'content=' + encodeURIComponent(content),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error('Erreur lors de l\'enregistrement du fichier:', error);
                alert('Une erreur s\'est produite lors de l\'enregistrement du fichier.');
            });
        }
    </script>
</body>
</html>
