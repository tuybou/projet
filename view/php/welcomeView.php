<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue dans votre session</h2>
    <?php
        // Afficher le message de bienvenue avec le prénom et le nom de l'utilisateur
        echo "<p>Bonjour " . $user_info['First Name'] . " " . $user_info['Last Name'] . " !</p>";
    ?>
</body>
</html>
