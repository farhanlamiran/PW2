<?php
namespace App\Models;
use CodeIgniter\Model;

class KonversiModel extends Model
{
    protected $table = 'konversi';
    protected $allowedFields = ['satuan_id','suhu','condition'];
}