<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentsModel extends Model
{
    protected $table            = 'moviment';
    protected $returnType       = 'array';

    //Busca as listas de movimento
    public function listMoviments()
    {
        $db = db_connect();
        $list = $db->query("SELECT * FROM moviment")->getResultArray();
        $db->close();
        return $list;
    }

    //Seleciona o valor de entrada no livro caixa
    public function entradas()
    {
        $db = db_connect();
        $input = $db->query("SELECT sum(value) AS input FROM moviment WHERE type='input'")->getResultArray();
        $db->close();
        return $input[0]['input'];
    }

    //Seleciona todas as entradas no livro caixa
    public function todasEntradas()
    {
        $db = db_connect();
        $input = $db->query("SELECT value AS input FROM moviment WHERE type='input'")->getResultArray();

        return $input;
    }

    //Seleciona o valor de saida do livro caixa
    public function output()
    {
        $db = db_connect();
        $output = $db->query("SELECT sum(value) AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $output[0]['output'];
    }

    //Seleciona todas as saidas do livro caixa
    public function outputAll()
    {
        $db = db_connect();
        $output = $db->query("SELECT value AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $output;
    }

    //Seleciona os valores de entrada e saida
    public function lista()
    {
        $db = db_connect();
        $list = $db->query("SELECT DISTINCT m.date, 
        (select SUM(value) from moviment WHERE date = m.date AND type = 'input') AS input,
        (select sum(value) from moviment WHERE date = m.date AND type = 'output') AS output 
        FROM moviment m")->getResultArray();
        $db->close();
        return $list;
    }

    //Seleciona os movimentos por ano e data
    public function listaFiltrada()
    {
        $db = db_connect();
        $ano = $_POST['ano'];
        $mes = $_POST['mes'];
        $list = $db->query("SELECT * FROM moviment WHERE YEAR(date) = $ano AND MONTH(date) = $mes")->getResultArray();
        $db->close();
        return $list;
    }
    
    //Seleciona todos os valores para entrada e saida
    public function balanco_caixa()
    {
        $db = db_connect();
        $input = $db->query("SELECT sum(value) AS input FROM moviment WHERE type='input'")->getResultArray();
        $output = $db->query("SELECT sum(value) AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $input[0]['input'] - $output[0]['output'];
    }

    protected $DBGroup          = 'default';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'description',
        'date',
        'value',
        'type'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
