<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Admin extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function home()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('admin/home', $data);
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'daftar komik',
            'komik' => $this->komikModel->getKomik()
        ];
        return view('admin/index', $data);
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
        return view('admin/detail', $data);
    }


    public function create()
    {


        $data = [
            'title' => 'add new comic',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[comics.judul]',
                'errors' => [
                    'required' => '{field} komik harus di isi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/admin/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
            'sinopsis' => $this->request->getVar('sinopsis')
        ]);
        session()->setFlashdata('pesan', 'succes add comic');
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'succes deleted comic');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'edited a comic',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('admin/edit', $data);
    }

    public function update($id)
    {
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus di isi',
                    'is_unique' => '{field} komik sudah ada'
                ]
            ],
            'penulis' => [
                'rules' => 'required'
            ]

        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/admin/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul'),
            'sinopsis' => $this->request->getVar('sinopsis')
        ]);
        session()->setFlashdata('pesan', 'succes edited comic');
        return redirect()->to('/admin');
    }


    //--------------------------------------------------------------------

}
