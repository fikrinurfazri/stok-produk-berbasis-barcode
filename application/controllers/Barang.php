<?php

use PhpParser\Node\Stmt\Echo_;

class Barang extends CI_Controller
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

    public function addproduk()
    {
        $data = [
            'title'  => "Pengaturan Produk",
            'user'   => $this->user_model->getuser(),
            'model' => $this->db->get('model')->result(),
            'warna' => $this->db->get('warna')->result(),
            'id'   => $this->barcode_model->get(),
            'product' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barang/tambah', $data);
        $this->load->view('pages/footer');
    }
    public function qrmasuk()
    {
        $data = [
            'title'  => "Barang Masuk QR",
            'user'   => $this->user_model->getuser(),
            'masuk' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barang/qr', $data);
        $this->load->view('pages/footer');
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
    public function input()
    {
        $no = 1;
        $barcode = $this->input->post('barcode');
        $code = $barcode + $no;
        $bar = '0' . $code;
        $lantai =  $this->input->post('lantai');
        $models = $this->input->post('model');
        $collor = $this->input->post('warna');
        $ada = $this->barcode_model->cek($models, $collor);
        if ($ada) {
            // Notifikasi jika data sudah ada
            $this->session->set_flashdata('error', 'Data sudah ada di database.');
            redirect('barang/addproduk'); // Ganti dengan URL atau nama fungsi yang sesuai
        } else {

            $data = [
                'lantai' => $lantai,
                'models' => $models,
                'collor' => $collor,
                'barcode' => $bar
            ];
            $this->db->insert('products_all', $data);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

            redirect('barang/addproduk');
        }
        redirect('barang/addproduk');
    }
    public function deletebrg($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('products_all');
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('barang/addproduk');
    }
    public function prosesmodel()
    {
        $model = $this->input->post('model');
        $ada = $this->barcode_model->cekm($model);
        if ($ada) {
            // Notifikasi jika data sudah ada
            $this->session->set_flashdata('error', 'Data sudah ada di database.');
            redirect('barang/addproduk'); // Ganti dengan URL atau nama fungsi yang sesuai
        } else {

            $data = [
                'model' => $model,

            ];
            $this->db->insert('model', $data);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

            redirect('barang/addproduk');
        }
    }
    public function proseswarna()
    {
        $warna = $this->input->post('warna');
        $ada = $this->barcode_model->cekw($warna);
        if ($ada) {
            // Notifikasi jika data sudah ada
            $this->session->set_flashdata('error', 'Data sudah ada di database.');
            redirect('barang/addproduk'); // Ganti dengan URL atau nama fungsi yang sesuai
        } else {

            $data = [
                'warna' => $warna,

            ];
            $this->db->insert('warna', $data);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');

            redirect('barang/addproduk');
        }
    }

    public function masuk()
    {
        $data = [
            'title'  => "Barang Masuk",
            'user'   => $this->user_model->getuser(),
            'masuk' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barang/masuk', $data);
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
            $response = [
                'status' => 'berhasil',
            ];
        } else {
            // Jika barcode tidak ditemukan, kirim respons JSON yang menyatakan gagal (status 'gagal').
            $response = [
                'status' => 'false'
            ];
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }
    public function kurang()
    {
        // Mengambil barcode dari input form
        $barcode = $this->input->post('barcode');
        $barang = $this->db->get_where('products_all', array('barcode' => $barcode))->row();

        if ($barang) {

            // Jika barang ditemukan, tambahkan jumlahnya
            $jumlahBaru = $barang->jumlah - 1;

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
            $response = [
                'status' => 'berhasil',
            ];
        } else {
            // Jika barcode tidak ditemukan, kirim respons JSON yang menyatakan gagal (status 'gagal').
            $response = [
                'status' => 'false'
            ];
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }
    public function get()
    {
        // Panggil model untuk mengambil data produk
        $products = $this->db->get('products_all')->result();

        // Kembalikan data dalam format JSON
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($products));
    }
    public function getm()
    {
        // Panggil model untuk mengambil data produk
        $products = $this->db->get('model')->result();

        // Kembalikan data dalam format JSON
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($products));
    }
    public function keluar()
    {
        $data = [
            'title'  => "Barang Keluar",
            'user'   => $this->user_model->getuser(),
            'all' => $this->db->get('products_all')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/barang/keluar', $data);
        $this->load->view('pages/footer');
    }
    public function kurang_old()
    {
        $barcode = $this->input->post('barcode');
        $barang = $this->db->get_where('products_all', array('barcode' => $barcode))->row();

        if ($barang) {
            // Jika barang ditemukan, tambahkan jumlahnya
            $jumlahBaru = $barang->jumlah - 1;

            // Update jumlah barang di database
            $this->db->where('barcode', $barcode);
            $this->db->update('products_all', array('jumlah' => $jumlahBaru));

            $data = [
                'barcode' => $barcode,
                'jumlah' => 1,
                'tanggal' => date('Y-m-d'),
                'jenis' => 'KELUAR'
            ];


            $this->db->insert('laporan_barang', $data);
            $response = [
                'status' => 'berhasil',
            ];
        } else {
            // Jika barcode tidak ditemukan, kirim respons JSON yang menyatakan gagal (status 'gagal').
            $response = [
                'status' => 'gagal'
            ];
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }
    public function delete($id)
    {
        $this->db->where('id_product', $id);
        $this->db->delete('products_all');
        redirect('barcode');
    }
    public function deletemodel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('model');
        redirect('barang/addproduk');
    }
    public function deletewarna($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('warna');
        redirect('barang/addproduk');
    }
}
