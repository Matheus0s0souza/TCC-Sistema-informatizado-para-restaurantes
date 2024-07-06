<?php
//define('BASE_PATH', __DIR__);
class clsIngredientes
{

    private $idingre;
    private $ingre;
    private $gramas;
    private $descricao;


    private $conexao; // conexao com o database

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    //--------------------------------------------------------
    public function getIdIngre()
    {
        return $this->idingre;
    }
    public function setIdIngre($idIg)
    {
        $this->idingre = $idIg;
    }

    //--------------------------------------------------------
    public function getingre()
    {
        return $this->ingre;
    }
    public function setingre($ig)
    {
        $this->ingre = $ig;
    }

    //--------------------------------------------------------

    public function getgramas()
    {
        return $this->gramas;
    }
    public function setgramas($gm)
    {
        $this->gramas = $gm;
    }
    //--------------------------------------------------------

    public function getdescricao()
    {
        return $this->descricao;
    }
    public function setdescricao($desc)
    {
        $this->descricao = $desc;
    }
    //--------------------------------------------------------

    //------------------registro------------------------------

    public function Registrar()
    {

        //include "conexao.php";
        try {
            $comando = $this->conexao->prepare("insert into tb_ingredientes (nm_ingr, gra_ingr, desc_ingr) values (?,?,?)");
            $comando->bindParam(1, $this->ingre);
            $comando->bindParam(2, $this->gramas);
            $comando->bindParam(3, $this->descricao);

            if ($comando->execute()) {
                $retorno = "<script>alert('gravado com sucesso');</script>";
            }
        } catch (PDOException $erro) {
            $retorno = "Erro " . $erro->getMessage();
        }
        return $retorno;
    }

    //---------------------------verificar--------------------------------------------
    public function Consultar()
    {
        try {
            $comando = $this->conexao->prepare("SELECT * FROM tb_ingredientes WHERE nm_ingr = ? or gra_ingr = ?;");
            $comando->bindParam(1, $this->ingre);
            $comando->bindParam(2, $this->gramas);

            if ($comando->execute()) {
                if ($comando->rowCount() > 0) {
                    $Tabela     = $comando->fetchAll(PDO::FETCH_ASSOC);
                    $retorno    = json_encode($Tabela);
                } else {
                    $retorno = "nenhum ingrediente encontrado";
                }
            }
        } catch (PDOException $erro) {
            $retorno = "Erro " . $erro->getMessage();
        }
        return $retorno;
    }
    //--------------------------------- deletar -----------------------------------------

    public function Deletar()
    {
        try {
            $comando = $this->conexao->prepare("DELETE FROM tb_ingredientes WHERE id_ingr = ?");
            $comando->bindParam(1, $this->idingre);

            if ($comando->execute()) {
                $retorno = "deletado";
            }
        } catch (PDOException $erro) {
            $retorno = $erro->getMessage();
        }
        return $retorno;
    }
    //-------------------------------------PEGAR POR ID PARA ALTERACAO-----------------------------------------------
    public function editar() //mudar os nomes das funções
    {
        try {
            $comando = $this->conexao->prepare("SELECT * FROM tb_ingredientes WHERE id_ingr = ?");
            $comando->bindParam(1, $this->idingre);

            if ($comando->execute()) {
                if ($comando->rowCount() > 0) {
                    
                    $Tabela     = $comando->fetchAll(PDO::FETCH_ASSOC);
                    $retorno    = $Tabela;
                } else {
                    $retorno = "nenhum ingrediente encontrado";
                }
            }
        } catch (PDOException $erro) {
            $retorno = $erro->getMessage();
        }
        return $retorno;
    }
    //-------------------------------------ALTERAR---------------------------------------------------
    public function Alterar() //mudar os nomes das funções
    {
        try {
            $comando = $this->conexao->prepare("UPDATE tb_ingredientes SET nm_ingr=?, gra_ingr=?, desc_ingr=? WHERE id_ingr=?");
            $comando->bindParam(1, $this->ingre);
            $comando->bindParam(2, $this->gramas);
            $comando->bindParam(3, $this->descricao);
            $comando->bindParam(4, $this->idingre);
            if ($comando->execute()) {
                
                $retorno = "<script>alert('gravado com sucesso');</script>";
            } else {
                $retorno = "Erro ao executar o comando de alteração";
            }
        } catch (PDOException $erro) {
            $retorno = $erro->getMessage();
        }
        return $retorno;
    }
}
