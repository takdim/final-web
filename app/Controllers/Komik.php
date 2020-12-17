<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function home()
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM comics ORDER BY updated_at DESC');
        $comic =  $query->getResultArray();
        $data = [
            'title' => 'Home',
            'komik' => $comic
        ];
        return view('komik/home', $data);
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'daftar komik',
            'komik' => $this->komikModel->getKomik()
        ];
        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'detail komik',
            'komik' => $komik
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik ' . $slug . ' tidak ada');
        }
        return view('komik/detail', $data);
    }

    //--------------------------------------------------------------------

}
