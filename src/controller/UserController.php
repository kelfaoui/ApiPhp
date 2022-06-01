<?php


namespace Mvc\Controller;

use Config\Controller;

use Mvc\Model\UserModel;

class UserController extends Controller{

    
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function page()
    {
        $this->sendReponse(200, $this->userModel->findAll());
    }


    public function pageTournoi()
    {
        $this->sendReponse(200, $this->userModel->findAllTournoi());
    }


    public function create()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isAccountCreated = $this->userModel->create($userData[0]["username"], $userData[0]["mail"], $userData[0]["password"]);

        $status = 200;
        $message = 'Error  while creating try again';

        if ($isAccountCreated)
        {
            http_response_code(201);
            $status = 201;
            $message = 'account create successfully and welcome to the tournament';
        }

        echo json_encode([
            'status' => $status,
            'data' => [],
            'message' => $message
        ]);
    }



    public function createUser()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isAccountCreated = $this->userModel->create($userData[0]["username"], $userData[0]["mail"], $userData[0]["password"]);

        $status = 200;
        $message = 'Error while creating User try again ';

        if ($isAccountCreated)
        {
            http_response_code(201);
            $status = 201;
            $message = 'account has created successfully';
        }

        echo json_encode([
            'status' => $status,
            'data' => [],
            'message' => $message
        ]);

    }

    public function update(int $id)
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isUserUpdated = $this->userModel->update($userData[0]['name'],$userData[0]['mail'],$userData[0]['password'], $id,);

        $message = $isUserUpdated === true ? 'Task has been updated' : 'Error while updating ';

        echo json_encode([
            'status' => 200,
            'data' => [],
            'message' => $message
        ]);
    }


    public function delete(int $id)
    {
        $this->userModel->delete($id);

        http_response_code(204);
        echo json_encode([
            'status' => 204,
            'data' => [],
        ]);
    }


    public function createTournoi()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isTournoiCreated = $this->userModel->createTournoi($userData[0]["name"],$userData[0]["circuit"],$userData[0]["Participants"]);

        $status = 200;
        $message = 'Error !! while creating the Tournament';

        if ($isTournoiCreated)
        {
            http_response_code(201);
            $status = 201;
            $message = 'account created successfully';
        }

        echo json_encode([
            'status' => $status,
            'data' => [],
            'message' => $message
        ]);
    }


  

    public function deleteTournoi(int $id)
    {
        $this->userModel->deleteTournoi($id);

        http_response_code(204);
        echo json_encode([
            'status' => 204,
            'data' => [],

        ]);
    }


    
    public function joinTournoi(int $user_id, int $tournament_id)
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isPlayerCreated = $this->userModel->joinTournoi($user_id, $tournament_id);

        $status = 200;
        $message = 'Error while joining tournament';

        if ($isPlayerCreated)
        {
            http_response_code(201);
            $status = 201;
            $message = 'participating to tournament successfully';
        }

        echo json_encode([
            'status' => $status,
            'data' => [],
            'message' => $message
        ]);
    }



    public function updateTournoi(int $id)
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isTournoiUpdated = $this->userModel->updateTournoi($userData[0]['name'],$userData[0]['circuit'],$userData[0]['Participants'], $id,);

        $message = $isTournoiUpdated === true ? 'Task has been updated' : 'Error while updating the Tournament';

        echo json_encode([
            'status' => 200,
            'data' => [],
            'message' => $message
        ]);
    }





    private function sendReponse(int $status, array $data = [])
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

        http_response_code($status);

        echo json_encode([
            'status' => $status,
            'data' => $data
        ]);
    }

}