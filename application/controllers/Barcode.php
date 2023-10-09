<?php

use PhpParser\Node\Stmt\Echo_;

class Barcode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model'); // Memuat model Barcode_model
        $this->load->model('barcode_model'); // Memuat model Barcode_model
        $this->load->library('Ciqrcode');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data = [
            'title'  => "Barcode",
            'user'   => $this->user_model->getuser(),
            'product' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barcode/index', $data);
        $this->load->view('pages/footer');
    }
    public function qr()
    {
        $data = [
            'title'  => "Barcode",
            'user'   => $this->user_model->getuser(),
            'product' => $this->db->get('products_all')->result()

        ];

        $this->load->view('qrcode_view', $data);
    }
    public function QRcode($kodenya)
    {
        //render  qr code dengan format gambar PNG
        QRcode::png(
            $kodenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size  = 6,
            $margin = 2
        );
    }
    public function add()
    {
        $data = [
            'title'  => "Add Product",
            'user'   => $this->user_model->getuser(),
            'id'   => $this->barcode_model->get(),
            'barcode' => $this->db->get('products_all', 1)->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barcode/add', $data);
        $this->load->view('pages/footer');
    }
    public function input()
    {
        $no = 1;
        $barcode = $this->input->post('barcode');
        $code = $barcode + $no;
        $bar = '0' . $code;

        $data = [
            'lantai' => $this->input->post('lantai'),
            'models' => $this->input->post('model'),
            'collor' => $this->input->post('warna'),
            'barcode' => $bar
        ];
        $this->db->insert('products_all', $data);
        redirect('barcode');
    }



    public function print($id)
    {

        $data = [
            'barcode' => $this->db->get_where('products_all', ['id_product' => $id])->row()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A6', 'potrait');
        $this->pdf->filename = "barcode-arbifa.pdf";
        $this->pdf->load_view('admin/barcode/print', $data);
    }
    public function qrcodeprt($id)
    {

        $data = [
            'barcode' => $this->db->get_where('products_all', ['id_product' => $id])->row()
        ];

        $this->load->library('pdf');

        $this->pdf->setPaper('A6', 'potrait');
        $this->pdf->filename = "qrcode-arbifa.pdf";
        $this->pdf->load_view('admin/barcode/qrprint', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('products_all');
        redirect('barcode');
    }
    public function lantai1()
    {
        $data = [
            'title'  => "Lantai 1",
            'user'   => $this->user_model->getuser(),
            'lantai1' => $this->db->get_where('products_all', ['lantai' => 1])->result()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/masuk/lantai1', $data);
        $this->load->view('pages/footer');
    }
    public function lantai2()
    {
        $data = [
            'title'  => "Lantai 2",
            'user'   => $this->user_model->getuser(),
            'lantai1' => $this->db->get_where('products_all', ['lantai' => 2])->result()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/masuk/lantai2', $data);
        $this->load->view('pages/footer');
    }
    public function tambah()
    {
        // Mengambil barcode dari input form
        $barcode = $this->input->post('barcode');
        $barang = $this->db->get_where('products_all', array('barcode' => $barcode))->row();

        if ($barang) {
            // Jika barang ditemukan, tambahkan jumlahnya
            $jumlahBaru = $barang->jumlah + 1;

            // Update jumlah barang di database
            $this->db->where('barcode', $barcode);
            $this->db->update('products_all', array('jumlah' => $jumlahBaru));

            $data = [
                'barcode' => $barcode,
                'jumlah' => 1,
                'tanggal' => date('Y-m-d'),
                'jenis' => 'MASUK'
            ];


            $this->db->insert('laporan_barang', $data);

            // Tampilkan pesan berhasil
            redirect('barcode/lantai1');
        } else {
            // Jika barang tidak ditemukan, tampilkan pesan error
            echo "Barang dengan barcode $barcode tidak ditemukan.";
        }
    }
    public function tambah2()
    {
        // Mengambil barcode dari input form
        $barcode = $this->input->post('barcode');
        $barang = $this->db->get_where('products_all', array('barcode' => $barcode))->row();

        if ($barang) {
            // Jika barang ditemukan, tambahkan jumlahnya
            $jumlahBaru = $barang->jumlah + 1;

            // Update jumlah barang di database
            $this->db->where('barcode', $barcode);
            $this->db->update('products_all', array('jumlah' => $jumlahBaru));

            // Tampilkan pesan berhasil
            redirect('barcode/lantai2');
        } else {
            // Jika barang tidak ditemukan, tampilkan pesan error
            echo "Barang dengan barcode $barcode tidak ditemukan.";
        }
    }
}
