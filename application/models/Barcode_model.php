<?php

class Barcode_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat library database CodeIgniter
    }

    public function insertBarcode($barcode)
    {
        $data = [
            'barcode' => $barcode
        ];
        $this->db->insert('products_all', $data); // Menggunakan nama tabel "barcodes" sesuai dengan struktur database Anda
        return $this->db->insert_id(); // Mengembalikan ID barcode yang baru saja dimasukkan
    }
    public function insert($data)
    {
        return $this->db->insert('laporan_barang', $data);
    }

    public function getBarcode($id)
    {
        $this->db->select('barcode');
        $this->db->from('product_alls');
        $this->db->where('id_product', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function get()
    {
        $this->db->order_by('id_product', 'DESC'); // Mengurutkan data berdasarkan kolom 'id' secara menurun (DESC)
        $this->db->limit(1); // Memuat hanya 1 baris data
        $query = $this->db->get('products_all'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function increaseQuantity($product_id, $quantity)
    {
        $this->db->where('barcode', $product_id);
        $this->db->set('jumlah', 'jumlah+' . $quantity, false);
        $this->db->update('products_all');
    }
    public function cek($models, $collor)
    {
        $this->db->where('models', $models);
        $this->db->where('collor', $collor);
        $query = $this->db->get('products_all'); // Ganti dengan nama tabel yang sesuai

        return $query->num_rows() > 0;
    }
    public function cekm($model)
    {
        $this->db->where('model', $model);
        $query = $this->db->get('model'); // Ganti dengan nama tabel yang sesuai

        return $query->num_rows() > 0;
    }
    public function cekw($warna)
    {
        $this->db->where('warna', $warna);
        $query = $this->db->get('warna'); // Ganti dengan nama tabel yang sesuai

        return $query->num_rows() > 0;
    }
}
