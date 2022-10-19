<?php
namespace App\Controllers;

//, INI ADALAH KONTROLLER YANG BERHAK MANGGIL VIEW DAN memanggil model
use App\Models\KategoriModel; #ini mesti dipanggil sblm buat function, nanti baru menggunaakan this untuk panggil kategori model

class Kategori extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KategoriModel = new KategoriModel();
    }

    public function list()
    {
        //select data from table kategori #ini kontroler manggil model, data sudah dpt dari db dibalikin lagi ke kontroller
        $list = $this->KategoriModel->select('id, nama')->orderBy('nama')->findAll(); #synyaks sql nya, apapun db nya nanti akan menyesuaikan

        $output = [ #lalu kontroller balikin ke view # ini view
            'list' => $list,
        ];

        return view('kategori_list', $output);
    }

    public function insert() #manggil kategori insert, yakni manggil view aja, menggunakan get, tanpa manggil model
    {
        return view('kategori_insert');
    }

    public function insert_save() #sedangkan disini, insert save itu mengakses model, yakni nambah data ke db, dengan method POST
    {
        $nama = $this->request->getVar('nama');

        //insert data ke table kategori
        $this->KategoriModel->insert([
            'nama' => $nama
        ]);

        return redirect()->to('kategori');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->KategoriModel->where('id', $id)->first();
        
        $output = [
            'data' => $data,
        ];

        return view('kategori_update', $output);
    }

    public function update_save($id)
    {
        $nama = $this->request->getVar('nama');

        //update data ke table kategori filter by id
        $this->KategoriModel->update($id, [
            'nama' => $nama
        ]);

        return redirect()->to('kategori/');
    }

    public function delete($id)
    {   
        //delete data table kategori filter by id
        $this->KategoriModel->delete($id);
        return redirect()->to('kategori');
    }
}