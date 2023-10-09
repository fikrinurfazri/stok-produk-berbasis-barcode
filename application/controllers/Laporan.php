<?php
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->model('user_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        // Tampilkan halaman laporan
        $data = [
            'title'  => "LAPORAN",
            'user'   => $this->user_model->getuser(),
            'product' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/laporan/tanggal', $data);
        $this->load->view('pages/footer');
    }

    public function generate()
    {
        // Ambil tanggal awal dan akhir dari form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        // Tampilkan hasil laporan
        $data = [
            'title'  => "Laporan Barang Masuk & Keluar",
            'user'   => $this->user_model->getuser(),
            'product' => $this->db->get('products_all')->result(),
            'laporan' => $this->laporan_model->getReportsByDate($start_date, $end_date),
            'keluar' => $this->laporan_model->getkeluar($start_date, $end_date),
            'awal' => $start_date,
            'akhir' => $end_date,

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/laporan/hasil', $data);
        $this->load->view('pages/footer');
    }
    public function bulan()
    {
        $bb = $this->input->post('bulan'); // Ambil nilai bulan dari form atau sesuai dengan kebutuhan Anda.
        $data = [
            'title'  => "Laporan Barang Masuk & Keluar",
            'user'   => $this->user_model->getuser(),
        ];

        // Panggil fungsi pada model untuk mendapatkan data laporan berdasarkan bulan.
        $data['perbulan'] = $this->laporan_model->getLaporanByBulan($bb);

        // Tampilkan view laporan dengan menggunakan data yang sudah diperoleh.
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/laporan/tanggal', $data);
        $this->load->view('pages/footer');
    }
}
