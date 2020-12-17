<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('pages/home', $data);
    }

    public function list()
    {
        $data = [
            'title' => 'list',
            'komik' => $this->komikModel->getKomik()
        ];
        return view('pages/list', $data);
    }

    //--------------------------------------------------------------------

}
