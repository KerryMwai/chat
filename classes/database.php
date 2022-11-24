<?php
class Database{
    private $servername,
            $username,
            $password,
            $dbname;

            public function Connect()
            {
                $this->servername="127.0.0.1:3308";
                $this->username="root";
                $this->password="";
                $this->dbname="chatting";

                $dsn="mysql:host=".$this->servername.";dbname=".$this->dbname;
                try{
                    $pdo=new PDO($dsn,$this->username,$this->password);
                    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $pdo;
                }catch(PDOException $e){
                    echo "Failed to connect".$e->getMessage();
                }
            }
}
?>