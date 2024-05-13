<?php
// Inclure le modèle
include_once('<model/php/loginModel.php');

// Vérifier si le formulaire de login a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Créer une instance du modèle
    $loginModel = new LoginModel();

    // Appeler la méthode du modèle pour authentifier l'utilisateur
    $authentication_result = $loginModel->authenticate_user($login, $password);

    // Vérifier le résultat de l'authentification
    if ($authentication_result) {
        // Récupérer les informations de l'utilisateur
        $user_info = $loginModel->get_user_info($login);

        // Rediriger l'utilisateur en fonction de son rôle
        switch ($user_info['Role_ID']) {
            case 1:
                header('Location: Role1Controller.php');
                exit;
            case 2:
                header('Location: Role2Controller.php');
                exit;
            case 3:
                header('Location: Role3Controller.php');
                exit;
            default:
                // Gérer le cas où aucun rôle approprié n'est trouvé
                echo "Aucun rôle approprié trouvé.";
                break;
        }
    } else {
        // Authentification échouée, afficher un message d'erreur
        echo "Identifiants incorrects.";
        // Inclure à nouveau le formulaire de connexion
        include_once('views/loginForm.php');
    }
} else {
    // Afficher le formulaire de connexion par défaut si aucune soumission de formulaire n'a eu lieu
    include_once('view/php/loginView.php');
}
?>
