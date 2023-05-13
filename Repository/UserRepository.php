<?php

class UserRepository extends ParentRepository
{



    public function __construct($pdo)
    {
        parent::__construct($pdo, DB_TABLE_USER, Flight::class);


    }


    public function verificationUser(){
        if(!session_id()){
            session_start();
        }

        if(isset($_POST['email']) && isset($_POST['password'])) {
            $usermail = trim($_POST['email']);
            $password = trim($_POST['password']);
        
        try {
            if($usermail !== "" && $password !== ""){ 
                
                $userSql = "SELECT count(*) FROM users where email = '". $usermail."' and password = '".$password."' ";
        
                $userStmt = $this->pdo->prepare($userSql);

        
                $userStmt->execute();
                $count = $userStmt->fetchColumn();
                
        
                if($count){
                
                    header('Location: ../flight/list');
        
                    $statement = $this->pdo->query('SELECT * FROM users WHERE email= "' . $usermail . '"', PDO::FETCH_ASSOC);
                    $result = $statement->fetch();
                        
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['user_id'] = $result['id'];
                    var_dump($_SESSION['name']);
                    var_dump($_SESSION['user_id']);
                    ?>
                    <a class="btn btn-primary btn-lg" href="homepage.php">Commencer la recherche</a></div>
                    <?php 
                    
                    } else {
                        echo "Mauvais Identifiant / mdp";
                    }
                    
                } else {
                    echo "introuvable";
                }
        
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
            
        }





    }





}