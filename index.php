<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet NoSQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }
        .form-section {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            text-align: left;
        }
        .form-section h2 {
            margin-bottom: 10px;
        }
        .form-section form {
            display: flex;
            flex-direction: column;
        }
        .form-section label {
            margin: 5px 0;
        }
        .form-section input {
            margin-bottom: 10px;
            padding: 5px;
        }
        .toggle-button {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function toggleDatabase() {
            const forms = document.querySelectorAll('.form-section h2');
            forms.forEach(form => {
                if (form.textContent.includes('relationelle')) {
                    form.textContent = form.textContent.replace('relationelle', 'non relationelle');
                } else {
                    form.textContent = form.textContent.replace('non relationelle', 'relationelle');
                }
            });
        }
    </script>
</head>
<body>
    <h1>Projet NoSQL</h1>
    <button class="toggle-button" onclick="toggleDatabase()">Changer de base</button>
    <div class="container">
        <!-- Section Create -->
        <div class="form-section">
            <h2>Créer un client (base relationelle)</h2>
            <form action="" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
                <label for="telephone">Numéro de téléphone :</label>
                <input type="text" id="telephone" name="telephone" required>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Créer</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour créer un client -->
        </div>

        <!-- Section Read -->
        <div class="form-section">
            <h2>Lire un client (base relationelle)</h2>
            <form action="" method="GET">
                <label for="login-read">Login :</label>
                <input type="text" id="login-read" name="login" required>
                <button type="submit">Lire</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour lire un client -->
        </div>

        <!-- Section Update -->
        <div class="form-section">
            <h2>Mettre à jour un client (base relationelle)</h2>
            <form action="" method="POST">
                <label for="nom-update">Nom :</label>
                <input type="text" id="nom-update" name="nom" required>
                <label for="prenom-update">Prénom :</label>
                <input type="text" id="prenom-update" name="prenom" required>
                <label for="login-update">Login :</label>
                <input type="text" id="login-update" name="login" required>
                <label for="adresse-update">Adresse :</label>
                <input type="text" id="adresse-update" name="adresse" required>
                <label for="telephone-update">Numéro de téléphone :</label>
                <input type="text" id="telephone-update" name="telephone" required>
                <label for="email-update">Email :</label>
                <input type="email" id="email-update" name="email" required>
                <button type="submit">Mettre à jour</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour mettre à jour un client -->
        </div>

        <!-- Section Delete -->
        <div class="form-section">
            <h2>Supprimer un client (base relationelle)</h2>
            <form action="" method="POST">
                <label for="login-delete">Login :</label>
                <input type="text" id="login-delete" name="login" required>
                <button type="submit">Supprimer</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour supprimer un client -->
        </div>
    </div>
</body>
</html>
