<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Result</title>
    <!-- Lien vers le fichier CSS pour cette vue -->
    <link rel="stylesheet" href=".../css/loginView.css">
</head>
<body>
    <?php
        // Inclure le modèle pour accéder à la méthode get_user_info()
        include_once('model/php/loginModel.php');

        // Récupérer le login à partir du formulaire POST
        $login = $_POST['Login'];

        // Récupérer les informations de l'utilisateur
        $user_info = $loginModel->get_user_info($login);

        // Afficher le résultat de l'authentification et les informations de l'utilisateur
        if ($authentication_result) {
            echo "<p>Authentification réussie !</p>";
            echo "<p>Session de " . $user_info['First Name'] . " " . $user_info['Last Name'] . "</p>";
            echo "<p>Rôle : " . $user_info['Role'] . "</p>";
        } else {
            echo "<p>Identifiants incorrects.</p>";
        }
    ?>
</body>
</html>
