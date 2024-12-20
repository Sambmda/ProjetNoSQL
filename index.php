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
                if (form.textContent.includes('non relationnelle')) {
                    form.textContent = form.textContent.replace('non relationnelle', 'relationnelle');
                } else {
                    form.textContent = form.textContent.replace('relationnelle', 'non relationnelle');
                }
            });
			// Modifier la valeur de l'input avec name="database_type"
			const inputs = document.querySelectorAll('input[name="database_type"]');
			inputs.forEach(input => {
				if (input.value.includes('non relationnelle')) {
					input.value = 'relationnelle';
				} else {
					input.value = 'non relationnelle';
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
            <h2>Créer un client (base relationnelle)</h2>
            <form action="" method="POST">
				<input type="hidden" name="database_type" value="relationnelle">
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
            <h2>Lire un client (base relationnelle)</h2>
            <form action="" method="GET">
				<input type="hidden" name="database_type" value="relationnelle">
                <label for="login-read">Login :</label>
                <input type="text" id="login-read" name="login-read" required>
                <button type="submit">Lire</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour lire un client -->
        </div>

        <!-- Section Update -->
        <div class="form-section">
            <h2>Mettre à jour un client (base relationnelle)</h2>
            <form action="" method="POST">
				<input type="hidden" name="database_type" value="relationnelle">
                <label for="nom-update">Nom :</label>
                <input type="text" id="nom-update" name="nom-update" required>
                <label for="prenom-update">Prénom :</label>
                <input type="text" id="prenom-update" name="prenom-update" required>
                <label for="login-update">Login :</label>
                <input type="text" id="login-update" name="login-update" required>
                <label for="adresse-update">Adresse :</label>
                <input type="text" id="adresse-update" name="adresse-update" required>
                <label for="telephone-update">Numéro de téléphone :</label>
                <input type="text" id="telephone-update" name="telephone-update" required>
                <label for="email-update">Email :</label>
                <input type="email" id="email-update" name="email-update" required>
                <button type="submit">Mettre à jour</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour mettre à jour un client -->
        </div>

        <!-- Section Delete -->
        <div class="form-section">
            <h2>Supprimer un client (base relationnelle)</h2>
            <form action="" method="POST">
				<input type="hidden" name="database_type" value="relationnelle">
                <label for="login-delete">Login :</label>
                <input type="text" id="login-delete" name="login-delete" required>
                <button type="submit">Supprimer</button>
            </form>
            <!-- TODO: Ajouter la requête SQL ou NoSQL pour supprimer un client -->
        </div>
    </div>
</body>
</html>

<?php
require 'vendor/autoload.php';
// Attendre quelques secondes avant d'essayer de se connecter
sleep(5);
// Connexions aux bases de données
$pg_conn = pg_connect("host=postgres_db port=5432 dbname=projet_nosql user=user_no_sql password=password");
$mongo = new MongoDB\Client("mongodb://mongo_db:27017");
$mongo_db = $mongo->projet_nosql;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Détection du formulaire
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['adresse'], $_POST['telephone'], $_POST['email'], $_POST['database_type'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $login = $_POST['login'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $database_type = $_POST['database_type']; // Récupérer le type de base de données choisi

        if ($database_type === 'relationnelle') {
            // Insertion dans PostgreSQL
            $query = "INSERT INTO clients (nom, prenom, login, adresse, telephone, email) VALUES ($1, $2, $3, $4, $5, $6);";
            pg_query_params($pg_conn, $query, [$nom, $prenom, $login, $adresse, $telephone, $email]);
        } else {
            // Insertion dans MongoDB
            $mongo_db->clients->insertOne([
                'nom' => $nom,
                'prenom' => $prenom,
                'login' => $login,
                'adresse' => $adresse,
                'telephone' => $telephone,
                'email' => $email]);
        }
    } elseif (isset($_POST['login-delete'], $_POST['database_type'])) {
        $login = $_POST['login-delete'];
        $database_type = $_POST['database_type']; // Récupérer le type de base de données choisi

        if ($database_type === 'relationnelle') {
            // Suppression dans PostgreSQL
			$query = "DELETE FROM clients WHERE login = $1;";
			pg_query_params($pg_conn, $query, [$login]);
        } else {
            // Suppression dans MongoDB
            $mongo_db->clients->deleteOne(['login' => $login]);
        }
	} elseif (isset($_POST['login-update'], $_POST['nom-update'], $_POST['prenom-update'], $_POST['adresse-update'], $_POST['telephone-update'], $_POST['email-update'], $_POST['database_type'])) {
        $login = $_POST['login-update'];
        $nom = $_POST['nom-update'];
        $prenom = $_POST['prenom-update'];
        $adresse = $_POST['adresse-update'];
        $telephone = $_POST['telephone-update'];
        $email = $_POST['email-update'];
        $database_type = $_POST['database_type']; // Récupérer le type de base de données choisi

        if ($database_type === 'relationnelle') {
            // Mise à jour dans PostgreSQL
            $query = "UPDATE clients SET nom = $1, prenom = $2, adresse = $3, telephone = $4, email = $5 WHERE login = $6 ;";
            pg_query_params($pg_conn, $query, [$nom, $prenom, $adresse, $telephone, $email, $login]);
        } else {
            // Mise à jour dans MongoDB
            $mongo_db->clients->updateOne(
                ['login' => $login],
                ['$set' => [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'adresse' => $adresse,
                    'telephone' => $telephone,
                    'email' => $email]]);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['login-read'])) {
    $login = $_GET['login-read'];
    $database_type = $_GET['database_type'] ?? 'relationnelle'; // Par défaut, relationnelle si non précisé

    if ($database_type === 'relationnelle') {
        // Lecture dans PostgreSQL
        $query = "SELECT * FROM clients WHERE login = $1 ;";
        $result = pg_query_params($pg_conn, $query, [$login]);
        $client = pg_fetch_assoc($result);
        print_r($client);
    } else {
        // Lecture dans MongoDB
        $client = $mongo_db->clients->findOne(['login' => $login]);
        print_r($client);
    }
}
?>
