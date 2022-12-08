<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\MovimentsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $movModel = new MovimentsModel();
        $list=$movModel->lista();
        $data['lista'] = $list;
        $listaMovimentos=$movModel->listMoviments();
        $data['listMoviments'] = $listaMovimentos;
        $output=$movModel->output();
        $data['output'] = $output;
        $outputAll=$movModel->outputAll();
        $data['outputAll'] = $outputAll;
        $input=$movModel->entradas();
        $data['entradas'] = $input;
        $todasEntradas=$movModel->todasEntradas();
        $data['todasEntradas'] = $todasEntradas;
        $cash_balance=$movModel->balanco_caixa();
        $data['balanco_caixa'] = $cash_balance;
        return view('home', $data);
    }
}
