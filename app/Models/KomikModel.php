<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table = 'comics';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'pemerbit', 'sinopsis', 'sampul', 'bgPicture'];

    public function getKomik($slug = false)
    {
        if ($slug == false) {
            # code...
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
