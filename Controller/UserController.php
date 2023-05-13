<?php

class UserController 
{
    private UserRepository $userRepository;
    private $pdo;
    private $table;
    private $tableClass;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);

    }
        

    public function login()
    {
        
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $this->userRepository->verificationUser($_POST);
        };

        $flight = "Bienvenue Chez DonkeyAir";
        
        include BASE_PATH . '/View/header.html.php';
        include BASE_PATH . '/View/user/login.html.php';
        include BASE_PATH . '/View/footer.html.php';






    }






}