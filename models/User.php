<?php

class User {
    private $email;
    private $password;
    
    public function __construct(string $email, string $password) {
        $this->email = $email;
        $this->password = $password;
    }
    public function getPassword()  : string{
        
        return $this->password;
    
    }

    public function getEmail() : string {
        return $this->email;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }

       
    public function getMessage()  : string {
        return "Bonjour " . $this->email . ", bienvenue sur notre site !";
    }

    public function saveToDatabase() { 
        include_once 'config.php';
      
        $conn = mysqli_connect($host, $username, $password, $dbname);
       $stmt = $conn->prepare('SELECT * FROM users WHERE email = ? ');
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $resultats = $stmt->get_result();
        if($resultats->num_rows > 0 )
        { 
            return false;
        }
        $stmt=$conn->prepare("INSERT INTO users ( email , password) VALUES (?, ?) ");
        $stmt->bind_param("ss", $this->email, $this->password);
        $stmt->execute();
        $stmt->close();
    
    }
    
}

