<?php
// Inclure le fichier loginModel.php
include_once('model/php/loginModel.php');
include_once('model/php/env_settings.php');

// Instancier la classe LoginModel
$loginModel = new LoginModel();

// Récupérer les informations de l'utilisateur par son login
$user_info = $loginModel->get_user_info('login_de_la_personne');

// Vérifier si l'utilisateur a le rôle ID numéro 1
if ($user_info['RoleID'] == 1) {
    // Afficher un message de bienvenue
    echo "Bonjour {$user_info['First Name']} {$user_info['Last Name']}, bienvenue !";
} else {
    // Afficher un message d'erreur si l'utilisateur n'a pas le bon rôle
    echo "Désolé, vous n'avez pas la permission d'accéder à cette page.";
}
?>
