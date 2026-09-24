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
    public function query(string $statement): array
    {
        $req = $this->getBdd()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
}