<?php

namespace App\DAO;

use App\Model\User;

class UserDAO extends DAO
{
    public function isUsernameExist(string $username): bool
    {
        $sql = ('SELECT id FROM user WHERE pseudo = ?');
        $result = $this->sql($sql, [$username]);

        if ($result->rowCount()) {
            return true;
        }

        return false;
    }

    public function getUserByName(string $userName)
    {
        $sql = ('SELECT * FROM user WHERE pseudo = ?');
        $result = $this->sql($sql, [$userName]);
        
        return $result->fetch();
    }


    public function inscription(array $user)
    {
        extract($user);
        $passHashed = password_hash($pass, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user (pseudo, mail, droit, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())';
        $this->sql($sql, [$pseudo, $mail, 'user', $passHashed]);
    }

    public function getUsers()
    {
        $sql = 'SELECT id, pseudo, mail, droit, date_inscription FROM user ORDER BY id DESC';
        $result = $this->sql($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['id'];
            $userName = $row['pseudo'];
            $userMail = $row['mail'];
            $userDroit = $row['droit'];
            $userDate = $row['date_inscription'];
            $users[$userId] = $this->buildObject($row);
        }
        
        return $users;
    }

    public function getUser($idUser)
    {
        $sql = 'SELECT id, pseudo, mail, droit, date_inscription FROM user WHERE id = ?';
        $result = $this->sql($sql, [$idUser]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
            echo 'Aucun utilisateur existant avec cet identifiant';
        }
    }

    public function showUser($user)
    {
        //Accessible par Admin pour voir tous ou une partie des user
        $sql = 'SELECT * FROM user WHERE pseudo = ?';
        $result = $this->sql($sql[$user]);
        
        return $result->fetch();
    }

    public function deleteUser(string $userName)
    {
        //Accessible par Admin pour supprimer un user ou par user pour supprimer son propre compte
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $result = $this->sql($sql[$userName]);

        return $result;
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
        $user->setDateInscription($row['date_inscription']);
        
        return $user;
    }
}