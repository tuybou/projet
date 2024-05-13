<?php
// Inclure le modèle
include_once('model/php/loginModel.php');

// Créer une instance du modèle
$loginModel = new LoginModel();

// Récupérer le login à partir de la session ou des données POST
$login = $_POST['login']; // Ou toute autre méthode pour récupérer le login

// Récupérer les informations de l'utilisateur
$user_info = $loginModel->$loginModel->get_user_info($login);

// Charger la vue correspondante en fonction du rôle de l'utilisateur
if ($user_info['Role_ID'] == 1) {
    include_once('views/role1View.php');
} elseif ($user_info['Role_ID'] == 2) {
    include_once('views/role2View.php');
} elseif ($user_info['Role_ID'] == 3) {
    include_once('views/role3View.php');
} else {
    // Gérer le cas où aucun rôle approprié n'est trouvé
    echo "Aucun rôle approprié trouvé.";
}
?>

