
<?php
// Se realiza la conexion a la base de datos
$bd = new mysqli("localhost", "root", "", "inventariosg");

if($bd->connect_errno){
  printf("Conexión fallida %s\n", $bd->connect_error);
  exit();
}

?>

<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
//se crea un constructor de la base de datos para utilizar la conexion mas tarde en otros archivos 
//unicamnete llamando el archivo conexion.php
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'inventariosg';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}

?>