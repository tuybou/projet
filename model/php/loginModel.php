<?php
// Inclure la classe DBModel
require_once 'DBModel.php';

// Définir la classe LoginModel qui hérite de DBModel
class LoginModel extends DBModel {

    // Méthode pour authentifier l'utilisateur
    public function authenticate_user($login, $password) {
        try {
            // Préparer la requête SQL pour récupérer l'utilisateur par login
            $query = $this->db->prepare('SELECT * FROM logins WHERE Login = :login');
            $query->execute(['login' => $login]);
            $user = $query->fetch();

            // Vérifier si l'utilisateur existe et si le mot de passe correspond
            if ($user && $password === $user['Password']) {
                // Authentification réussie
                return true;
            } else {
                // Authentification échouée
                return false;
            }
        } catch (PDOException $e) {
            // Gérer l'erreur de connexion à la base de données
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les informations de l'utilisateur par login, y compris son statut
    public function get_user_info($login) {
        try {
            // Préparer la requête SQL avec une jointure entre les tables "logins" et "statut"
            $query = $this->db->prepare('SELECT logins.*, statut.Role FROM logins INNER JOIN statut ON logins.Role_ID = statut.Role_ID WHERE logins.Login = :login');
            $query->execute(['login' => $login]);
            $user_info = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner les informations de l'utilisateur
            return $user_info;
        } catch (PDOException $e) {
            // Gérer l'erreur de connexion à la base de données
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}

// Instancier la classe LoginModel
$loginModel = new LoginModel();
?>
