<?php
include('./DBConnections.php');
Class CRUD {
    public function select($sql) {   
        $conn = new ConnOracle(); 
        $sql_stmt = $conn->conn->prepare($sql);
        $sql_stmt->execute();
        $result = $sql_stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $value) {
            $codUsur = $value['CODIGO'];
            $nomeUsur = $value['NOME'];
            $outroDado = $value['OUTRO'];
        }
      }

      public function update($update){
        $conn = new ConnOracle(); 
        $sql_stmt = $conn->conn->prepare($update);
        $sql_stmt->execute();
    }
}

// Chamando funções do Crud
try {
    $conn->select("select * from usuarios");
    $conn->update("update usuario set nome = 'novo nome' where codigo =1");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>