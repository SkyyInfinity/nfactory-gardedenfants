<?php
namespace Core\Database;

class Database{

    private $host;
    private $dbname;
    private $user; 
    private $pass;
    public $pdo;


    /**
     * Db connection
     */
    public function __construct()
    {
        require ROOT."Config/DbConfig.php";
        $this->host = $config["dbHost"];
        $this->dbname = $config["dbName"];
        $this->user = $config["dbUser"];
        $this->pass = $config["dbPassword"];

        try {
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES UTF8");
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Return data from Db
     *
     * @param string $statement
     * @param boolean $one
     * @return object || array
     */
    public function getData(string $statement, bool $one = false)
    {
        $query = $this->pdo->query($statement);

        if ($one) {
            return $query->fetch(\PDO::FETCH_OBJ);
        }
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Enregistre des informations dans une table dans la BDD
     *
     * @param string $statement
     * @param array $values
     */
    public function postData(string $statement, array $values = [])
    {
        $prepare = $this->pdo->prepare($statement);
        $prepare->execute($values);
    }
}