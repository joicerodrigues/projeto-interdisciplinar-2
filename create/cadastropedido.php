<?php
class DataBaseService {
    public $servername = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'bikelive';

    //função para conexão
    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        if(!$this->conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
    }

    //função para destruir conexão
    public function __destruct()
    {
        mysqli_close($this->conn);
    }


    public function adicionarPedido() {

            // Preparando o comando SQL
            $sql = "INSERT INTO  (`id`, `cnpj`, `id_categoria`, `valor`, `data_pedido`, `disponivel`, `dimensao`, `peso`, `rua`, `numero`, `bairro`, `cidade`, `complemento` ) ";
            $sql = $sql."VALUES () ";
        echo $sql;
            if(mysqli_query($this->conn, $sql)) {
                header("location: ../.php?status=sucess");
            } else {
                echo("Falha ao realizar o cadastro" . $sql . mysqli_error($this->conn));
            }
    }
}

    if(!empty($_POST)) {
    


        $realizarCadastro = new DataBaseService();
        $realizarCadastro -> adicionarPedido();
    };
    
?>

?>