<?php
class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $dsn;

    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'my_blog01';
        $this->charset = 'utf8mb4';

        //data source name
        $this->dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
        //try to connect
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // set the fetch mode. If it is not set, we willge the results two times
            //with different keys. One key will be the assigned by the user and another one
            //will be a numeric key assigned by the program.
            //example (without fetch_assoc): you expect ['username'=>'toni','email'=>'toni@gmail.com] but will receive ['username'=>'toni',0=>'toni','email'=>'toni@gmail.com,1=>'toni@gmail.com'] 
            return $pdo;
        } catch (PDOException $e) {
            //1049 is the code for unknown database  list of codes in: https://mariadb.com/kb/en/mariadb-error-codes/
            if ($e->getCode() == 1049) {
                //create database
                if($this->createDb()){
                    $pdo = $this->createTables();
                    if($pdo){
                        $this->insertInitialData($pdo);
                        return $pdo;
                    }else{
                        return false;
                    }
                }
            }
        }
    }

    public function createDb()
    {
        try {
            $pdo = new PDO('mysql:host' . $this->servername, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'CREATE DATABASE ' . $this->dbname;
            $pdo->exec($sql);
            return $pdo;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createTables()
    {
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            require '../import/dbTables.php';
            $pdo->exec($authors);
            $pdo->exec($posts);
            $pdo->exec($htmlElements);
            $pdo->exec($comments);
            return $pdo;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertInitialData($pdo)
    {
        require '../import/initialData.php';
        try{
            $pdo->exec($initialData);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

$conn = new Dbh();
$conn->connect();