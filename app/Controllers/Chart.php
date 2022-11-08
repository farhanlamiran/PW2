<?php
namespace App\Controllers;

//memanggil model
use App\Models\BukuModel;

class Chart extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->BukuModel = new BukuModel();
    }

    public function pie1()
    {
        //select data from table buku
        $list = $this->BukuModel->select('kategori.nama, SUM(buku.stok) AS stok')->join('kategori','buku.kategori_id = kategori.id')->groupBy('nama')->orderBy('nama')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_pie1', $output);
    }
    public function line()
    {
        //select data from table buku
        $list = $this->BukuModel->select('judul, stok')->orderBy('judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_line', $output);
    }
    public function pie2()
    {
        //select data from table buku
        $list = $this->BukuModel->select('judul, stok')->orderBy('judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_pie2', $output);
    }
}