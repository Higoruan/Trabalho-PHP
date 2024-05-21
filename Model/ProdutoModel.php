<?php

require_once 'Conexao.php';

class ProdutoModel extends Conexao
{

    public function CadastrarProduto($nome, $marca, $descricao, $preco)
    {
        if (trim($nome || $marca || $descricao || $preco) == '') {
            return 0;
            echo 'Preencher os campos!';
        }
        $conexao = parent::retornaConexao();

        $comando_sql = 'insert into produto
        (nome, marca, descricao, preco)
        VALUES (?, ?, ?, ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $marca);
        $sql->bindValue(3, $descricao);
        $sql->bindValue(4, $preco);

        try {
            $sql->execute();
            return 1;
            ECHO 'Cadastrado';
        } catch (Exception $ex) {
            //echo $ex->getMessage();
            -1;
            echo'erro';
        }
    }

    public function ConsultarProduto()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = 'SELECT id, nome, marca, descricao, preco FROM produto;';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
}
