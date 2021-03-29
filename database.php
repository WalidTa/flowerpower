<?php

class database {
    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;
    


    function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'flowerpower';

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->db";

            $this->dbh = new PDO($dsn, $this->user, $this->pass); 

        }catch(PDOException $e){

            die("Unable to connect: " . $e->getMessage());
        }
    }


    function insertKlantUser($username, $password){
            $sql = "INSERT INTO klant(klantcode, gebruikersnaam, wachtwoord) VALUES (:klantcode, :gebruikersnaam, :wachtwoord)";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                'klantcode'=>NULL,
                'gebruikersnaam'=>$username,
                'wachtwoord'=>password_hash($password, PASSWORD_DEFAULT)
            ]);
    }

    function insertMedewerkerUser($username, $password){
                $sql = "INSERT INTO medewerker(medewerkerscode, gebruikersnaam, wachtwoord) VALUES (:medewerkerscode, :gebruikersnaam, :wachtwoord)";

                $stmt = $this->dbh->prepare($sql);
                $stmt->execute([
                    'medewerkerscode'=>NULL,
                    'gebruikersnaam'=>$username,
                    'wachtwoord'=>password_hash($password, PASSWORD_DEFAULT)
                ]);
    }   


    function loginmedewerker($username, $pwd){
                $sql="SELECT * FROM medewerker WHERE gebruikersnaam = :uname";
                $stmt = $this->dbh->prepare($sql); 
                $stmt->execute(['uname'=>$username]); 
        
                $result = $stmt->fetch(PDO::FETCH_ASSOC); 
                if($result){
                    if(password_verify($pwd, $result["wachtwoord"])) {
                        echo "Valid login!";
                        header("location:");
                    } else {
                        echo "Invalid Password!";
                    }
                } else {
                    echo "Invalid login!";
                }
        
    }
        
    function loginklant($username, $pwd){
            $sql="SELECT * FROM klant WHERE gebruikersnaam = :uname";
        
            $stmt = $this->dbh->prepare($sql); 
            $stmt->execute(['uname'=>$username]); 
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            if($result){
                 if(password_verify($pwd, $result["wachtwoord"])) {
                    echo "Valid login!";
                    header("Location:");
                } else {
                    echo "Invalid Password!";
                }
            } else {
                echo "Invalid Login!";
            }
        
    }

    public function getAllArticles(){

            $sql = "SELECT * FROM artikel";
        
            // prepared statement (send statement to server  + checks syntax)
            $statement = $this->dbh->prepare($sql);
        
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            return $result;
    }

    public function delete($sql, $placeholders, $file){
            //  $artikels = $DBgetAllArtikels;

            $stmt = $this->dbh->prepare($sql);

            // $sql = 'SELECT * FROM medewerkers WHERE username=:username';

            $stmt->execute($placeholders);
            header('location: '.$file);
            exit;

    }

            

            

        


}

?>