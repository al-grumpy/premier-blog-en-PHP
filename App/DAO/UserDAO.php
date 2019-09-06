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

    public function isUsernameExist(string $username): bool
    {
        $sql = ('SELECT id FROM user WHERE pseudo = ?');
        $result = $this->sql($sql, [$username]);

        if ($result->rowCount()) {
            return true;
        }

        return false;
    }

    public function inscription(array $user)
    {
        extract($user);
        $passHashed = password_hash($pass, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user (pseudo, mail, droit, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())';
        $this->sql($sql, [$pseudo, $mail, 'user', $passHashed]);
    }

    public function getUser()
    {
        //Accessible par Admin pour voir tous ou une partie des user
    }

    public function deleteUser()
    {
        //Accessible par Admin pour supprimer un user ou par user pour supprimer son propre compte
    }

    public function forgetPass()
    {
        //Accessible par tous Admin et User en cas de Mdp oublié
    }
    
    private function buildObject(array $row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setDroit($row['droit']);
        $user->setMail($row['mail']);
        
        return $user;
    }
}