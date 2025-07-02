<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // ✅ Cek login
        if (!is_logged_in()) {
            redirect('auth/login');
        }

        // ✅ Cek role admin
        if (!is_admin()) {
            show_error('Akses ditolak. Halaman ini hanya bisa diakses oleh admin.');
        }

        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Import Buku dari Excel';
        $this->load->view('template/header', $data);
        $this->load->view('import/index');
        $this->load->view('template/footer');
    }

    public function upload()
    {
        require 'vendor/autoload.php';

        $file = $_FILES['file_excel']['tmp_name'];

        $reader = new Xlsx();
        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 1; $i < count($sheet); $i++) {
            $data = [
                'judul' => $sheet[$i][0],
                'penulis' => $sheet[$i][1],
                'penerbit' => $sheet[$i][2],
                'tahun_terbit' => $sheet[$i][3],
                'id_kategori' => $sheet[$i][4]
            ];
            $this->db->insert('buku', $data);
        }

        redirect('buku');
    }
}
