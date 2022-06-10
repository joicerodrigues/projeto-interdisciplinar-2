<?php

class DataBaseService{
    // Parâmetros da conexão com o banco de dados
    public $servername = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'bikelive';

    //função para conexão
    public function __construct()
    {
        // Criando a conexão
       $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
    }

    //função para destruir conexão
    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function selecionarEstabelecimento()
    {
        //Preparando sql
        $sql = "SELECT * FROM estabelecimento ";
        $result = $this->conn->query($sql);

        //Crianção da tabela que exibirá na tela caso não possuir dados irá trazer 0 results
        if ($result->num_rows > 0) {
            echo "<table align='left' cellspacing=9 cellpadding=9><tr><th>CNPJ</th><th>RAZÃO SOCIAL</th><th>NOME FANTASIA</th><th>TELEFONE</th><th>CEP</th><th>UF</th><th>CIDADE</th>
            <th>BAIRRO</th><th>RUA</th><th>NÚMERO</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["cnpj"]."</td><td>".$row["razao_social"]."</td><td>".$row["nome_fantasia"]."</td><td>".$row["telefone"]."</td><td>".$row["cep"]."</td><td>".$row["uf"]."</td>
                <td>".$row["cidade"]."</td><td>".$row["bairro"]."</td><td>".$row["rua"]."</td><td>".$row["numero"]."</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

}
$realizarListagem = new DataBaseService();
$realizarListagem -> selecionarEstabelecimento();
?>