<?php
namespace App\Controllers;

//memanggil model
use App\Models\KotaModel;
use App\Models\ProvinsiModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//memanggil package pdf
use Dompdf\Dompdf;

class KotaExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KotaModel = new KotaModel();
        $this->ProvinsiModel = new ProvinsiModel();
    }

    function export_xls()
    {
        //select data from table buku
        $list = $this->KotaModel->select('kota.id, kota.nama, provinsi.nama AS provinsi_nama')->join('provinsi','kota.provinsi_id = provinsi.id')->orderBy('provinsi.nama, nama')->findAll();

        //filename
        $fileName = 'kota_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'Provinsi')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'Kota')->getColumnDimension('C')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A'.$line, $line-1);
            $sheet->setCellValue('B'.$line, $row['provinsi_nama']);
            $sheet->setCellValue('C'.$line, $row['nama']);
            $line++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function export_pdf()
    {
        //select data from table buku
        $list = $this->KotaModel->select('kota.id, kota.nama, provinsi.nama AS provinsi_nama')->join('provinsi','kota.provinsi_id = provinsi.id')->orderBy('provinsi.nama, nama')->findAll();

        //filename
        $fileName = 'kota_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('kota_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }
}