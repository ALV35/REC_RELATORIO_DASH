<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MovimentsModel;
use App\Models\UserModel;

class MovimentsController extends BaseController
{
    public function index()
    {
        /*$movModel = new MovimentsModel();
        $data['moviments'] = $movModel->findAll();*/
        $moviModel = new MovimentsModel();
        $list = $moviModel->listMoviments();
        $data['moviments'] = $list;
        $cash_balance = $moviModel->balanco_caixa();
        $data['balanco_caixa'] = $cash_balance;
        return view('moviments/index', $data);
    }

    public function MovimentsPdf()
    {
        $moviModel = new MovimentsModel();
        $list = $moviModel->listMoviments();
        $data['moviments'] = $list;
        $cash_balance = $moviModel->balanco_caixa();
        $data['balanco_caixa'] = $cash_balance;
        $input = $moviModel->entradas();
        $data['entradas'] = $input;
        $output = $moviModel->output();
        $data['output'] = $output;
        return view('pdf', $data);
    }


    public function filtrar()
    {
        $moviModel = new MovimentsModel();

        $list = $moviModel->listaFiltrada();

        $data['moviments'] = $list;
        $cash_balance = $moviModel->balanco_caixa();
        $data['balanco_caixa'] = $cash_balance;
        return view('moviments/index', $data);
    }

    public function create() {
        $userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);

        $dados = [
            'title' => 'New moviment',
            'userInfo' => $userInfo,

        ];

        return view('moviments/form', $dados);
    }

    public function store(){
        $params = [
            'description' => $this->request->getPost('description'),
            'value' => $this->request->getPost('value'),
            'type' => $this->request->getPost('type'),
            'user_id' => session()->get('loggedInUser')
        ];

        $db = db_connect();
        $db->query("INSERT INTO moviment VALUES (DEFAULT, :description:, NOW(), :value:, :type:, :user_id:)", $params);
        $db->close();

        return $this->response->redirect(site_url('moviment'));
    }
}
