<?php

namespace Mvc\Model;

use Config\Model;

use PDO;

class UserModel extends Model{




    public function findAll()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `users`');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllTournoi()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `tournament`');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create(string $username, string $mail, string $password)
    {

        $statement = $this->pdo->prepare('INSERT INTO `users`(`username`, `mail`, `password` ) VALUES (:username, :mail, :password)');

        return $statement->execute([


            'username' => $username,
            'mail' => $mail,
            'password' => $password,

        ]);
    }

    public function createTournoi(string $name, string $circuit, int $Participants)
    {

        $statement = $this->pdo->prepare('INSERT INTO `tournament`(`name`,`circuit`, `Participants` ) VALUES (:name, :circuit, :Participants)');

        return $statement->execute([

            'name' => $name,
            'circuit' => $circuit,
            'Participants' => $Participants,

        ]);
    }

    public function delete(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        return $statement->execute([

            'id' => $id,
        ]);
    }

    public function deleteTournoi(int $id)
    {
        $statement = $this->pdo->prepare('DELETE FROM tournament WHERE id = :id');
        return $statement->execute([

            'id' => $id,
        ]);
    }


    public function joinTournoi(int $user_id, int $tournament_id)
    {

        $statement = $this->pdo->prepare('INSERT INTO `players` (`user_id`, `tournament_id`) VALUES (:user, :tournament_id)');

        return $statement->execute([

            'user' => $user_id,
            'tournament_id' => $tournament_id

        ]);
    }

  

    public function update(string $username, string $mail, string $password, int $id)
    {
        $statement = $this->pdo->prepare('UPDATE `users` SET username = :username, mail = :mail, password = :password WHERE id = :id');

        return $statement->execute([

            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'id' => $id
        ]);
    }

    public function updateTournoi(string $name, string $circuit, int $Participants, int $id)
    {
        $statement = $this->pdo->prepare('UPDATE `tournament` SET name = :name, circuit = :circuit, Participants = :Participants WHERE id = :id');

        return $statement->execute([

            'id' => $id,
            'name' => $name,
            'circuit' => $circuit,
            'Participants' => $Participants
            
        ]);
    }


   
    
}