<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/database/connection.php');

class DataBase extends DataBaseService{

    public function mostrarDados()
	{
		$query = "SELECT * FROM pedido";
		 $result = $this->conn->query($query);
		if ($result->num_rows > 0) 
        {
		    $data = array();
		    while ($row = $result->fetch_assoc()) 
            {
		           $data[] = $row;
		    }
			 return $data;
		}else{
			echo "No found records";
		}
	}

    public function deletarPedido($id) {
        
        // Preparando o comando SQL
        $query = "DELETE FROM pedido WHERE id = '$id'";
        $sql = $this->conn->query($query);
                
        if($sql==true) {

        } else {
            echo("Falha ao deletar" . $sql . mysqli_error($this->conn));
        }    

    }
}
?>