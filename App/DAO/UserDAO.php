<?php
namespace App\DAO;
use App\Model\User;
class UserDAO extends DAO
{
    public function login($user)
    {
        //Permet de recuperer les variables $title, $content et $author
        extract($user);
        $sql = ('SELECT id, pass FROM user WHERE pseudo = :pseudo');
        $result = $this->fetch();
    }
    public function inscription($user)
    {
        
        if(isset($post['submit'])) {
            $errors = array();
            if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
                $errors['pseudo'] = "Votre pseudo est vide ou  non valide";
            } else {
                $sql = 'SELECT id FROM user WHERE pseudo = ?';
                $result = $this->sql($sql, [$pseudo]);
                $user = $this->fetch();
                if($user){
                    $errors['pseudo'] = 'Ce pseudo est déjà pris';
                }
            }
            if(empty($_POST['mail']) || !filter_var($_POST['mail'] , FILTER_VALIDATE_EMAIL)){
                $errors['mail'] = "Votre email est vide ou  non valide";
            }
            if(empty($_POST['pass']) || $_POST['pass'] != $_POST['pass_confirm']){
                $errors['pass'] = "Les mots de passe sont différents";
            }
        }
        if(empty($errors)){
            //Hache le mot de passe User
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); //DEFAULT ou BCRYPT ????
            if(!empty($_POST)){
            //Permet de recuperer les variables du formulaire Inscription
            extract($user);
            $sql = 'INSERT INTO user (pseudo, mail, droit, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())';
            $this->sql($sql, [$pseudo, $mail, $droit, $pass_hash]); //droit => mettre automatiquement user ...
            }
        }
    }
    
    private function buildObject(array $row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setMail($row['mail']);
        
        return $user;
    }
}