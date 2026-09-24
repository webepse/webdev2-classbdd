<?php
namespace App;

use PDO;

class Database{
    /**
     * Nom de la base de données
     *
     * @var [string]
     */
    private $dbName;
    private $dbUser;
    private $dbPass;
    private $dbHost;

    private $bdd;

    public function __construct(string $dbName, string $dbUser="root", string $dbPass="",string $dbHost="localhost"){
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbHost = $dbHost;
    }

    /**
     * Connexion à la base de donnée
     *
     * @return PDO
     */
    private function getBDD(): PDO
    {
        if($this->bdd === NULL){
            try{
                $bdd = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=utf8",$this->dbUser,$this->dbPass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $this->bdd = $bdd;
            }catch(\Exception $e){
                // var_dump($e->getMessage());
                http_response_code(500);
                exit("Une erreur est survenue lors de la connexion au serveur");
            }
        }

        return $this->bdd;
    }

    /**
     * Permet de récupèrer en query des information de la bdd
     *
     * @param string $statement
     * @return array
     */
    public function query(string $statement, string $className): array
    {
        $req = $this->getBdd()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS,__NAMESPACE__."\\".$className);
        return $datas;
    }

    /**
     * Permet de créer une requête prepare à la base de données
     * @param string $statement
     * @param array $values
     * @param string $class_name
     * @param bool $one
     * @return Article|array|null
     */
    public function prepare(string $statement,array $values,string $class_name,bool $one=false): Article|array|bool
    {
        $req = $this->getBDD()->prepare($statement);
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_CLASS,__NAMESPACE__.'\\'.$class_name);
        if($one){
            $datas = $req->fetch();
            $req->closeCursor();
        } else{
            $datas = $req->fetchall();
        }
        return $datas;
    }

    /**
     * Permet d'ajouter un post à la base de données
     * @param string $title
     * @param string $content
     * @return void
     */
    public function addPost(string $title, string $content) : void
    {
        $req = $this->getBDD()->prepare("INSERT INTO posts(title,content,creation_date) VALUES(?,?,NOW())");
        $req->execute(array($title,$content));
    }
}