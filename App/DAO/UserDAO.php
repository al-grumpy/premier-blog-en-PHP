<?php

namespace App\DAO;

use App\Model\User;

class UserDAO extends DAO
{
    //Vérifie si username est présent dans la BDD
    public function isUsernameExist(string $username): bool
    {
        $sql = ('SELECT id FROM user WHERE pseudo = ?');
        $result = $this->sql($sql, [$username]);

        if ($result->rowCount()) {
            return true;
        }

        return false;
    }

    //Selectionne un utilisateur et stock ses informations
    public function getUserByName(string $username)
    {
        $sql = ('SELECT * FROM user WHERE pseudo = ?');
        $result = $this->sql($sql, [$username]);
        
        return $result->fetch();
    }

    //Méthode pour vérifier si les informations de connexion sont correct
    public function getUserByNameAndPassword(string $username, string $password)
    {
        $sql = ('SELECT * FROM user WHERE pseudo = ? AND pass = ?');
        $result = $this->sql($sql, [$username, $password]);

        return $result->fetch();
    }


    public function inscription(array $user)
    {
        extract($user);
        $passHashed = hash('sha512', $pass);
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