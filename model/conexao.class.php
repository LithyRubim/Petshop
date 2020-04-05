<?php
abstract class Conexao{
    private $servidor = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $banco = 'petshop';
    protected $conn;
            
    protected function conexao(){
        $this->conn = new PDO('mysql:host=' . $this->servidor . ';dbname=' . $this->banco, $this->user, $this->pass);
    }
}

class Crud extends Conexao {
    private $tabela; 

    public function __construct($tabela){        
        $this->conexao();	
        $this->tabela = $tabela;
    }

    public function insereCrud($array_dados) {        
        foreach($array_dados as $indice => $valor){
            $colunas[] = $indice;
            $marcacao[] = ":" . $indice;
        }
        $sql = "INSERT INTO {$this->tabela} (" . join(",", $colunas) . ") VALUES (" . join(",", $marcacao) . ")";
        $query = $this->conn->prepare($sql);     
        $query->execute($array_dados);
        if($query->rowCount() > 0){
            $id = $this->conn->lastInsertId();
            return $id;
        }else{
            return false;
        }
        $this->conn->close();
    }   

    public function selectCrud($colunas, $where = false, $array_dados = null, $operador = "=") {        
        if ($where) {            
            foreach($array_dados as $indice => $valor){
                $filtro[] = $indice . " " . $operador . " :" . $indice;
            }
            $sql = "SELECT {$colunas} FROM {$this->tabela} WHERE " . join(" AND ", $filtro);
            #echo "<p>$sql</p>";
            $query = $this->conn->prepare($sql);
            $query->execute($array_dados); 
        } else {
            $sql = "SELECT {$colunas} FROM {$this->tabela}";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
            
        $this->conn->close();  
    }   

    public function atualizaCrud($array_dados, $array_id) {
        foreach($array_dados as $indice => $valor){
            $dados[] = $indice . " = :" . $indice;
        }
        foreach($array_id as $indice => $valor){
            $id[] = $indice . " = :" . $indice;
        }
        $sql = "UPDATE {$this->tabela} SET " . join(",", $dados) . " WHERE " . join(" = ", $id);
        $query = $this->conn->prepare($sql);     
        $query->execute(array_merge($array_dados, $array_id));
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $this->conn->close();
    }

    public function excluiCrud($array_id) {
        foreach($array_id as $indice => $valor){
            $id[] = $indice . " = :" . $indice;
        }
        $sql = "DELETE FROM {$this->tabela} WHERE " . join(" = ", $id);  
        $query = $this->conn->prepare($sql);     
        $query->execute($array_id);
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        $this->conn->close();
    }

    public function convertData($data){
        if(strpos($data, "/")){
            $data = explode("/", $data);
            $data = join("-", array_reverse($data));
            return $data;
        }else{
            if(strpos($data, "-")){
                $data = explode("-", $data);
                $data = join("/", array_reverse($data));
                return $data;
            }
        }
    }

    
}
?>