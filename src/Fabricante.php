<?php
namespace CrudPoo;
use PDO, Exception;
class Fabricante {
    private int $id;
    private string $nome;
    // Esta propriedade recebera os recursos PDO atráves da classe Banco (dependência di projeto)
    private PDO $conexao;
    public function __construct(){
        /* No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o banco */
        $this->conexao = Banco::conecta();
    }
    public function lerFabricantes():array { // :array faz os dados virar array
        try {
            $sql = "SELECT id,nome FROM fabricantes";// string com o comando SQL
            $consulta = $this->conexao->prepare($sql);// preparação do comando
            $consulta->execute();// execuçaõ do comando
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);// capturar os resultados
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
        return $resultado;
    }
    public function inserirFabricante():void{ // :void faz a função sem retorno
        // :qualquer-coisa named parameter
        $sql= "INSERT INTO fabricantes(nome) VALUES (:nome)";
        try {
            $consulta = $this->conexao->prepare($sql);
            // bindparam('nome do parametro', $variavel_com_valor, constante de verificação)
            $consulta->bindparam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
    }
    public function lerUmFabricante(int $id):array {
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC); 
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
        return $resultado;
    }
    public function atualizarFabricante(int $id, string $nome):void{
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
    }
    public function excluirFabricante(int $id):void{
        $sql = "DELETE FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
?>