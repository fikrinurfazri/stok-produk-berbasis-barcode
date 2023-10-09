<?php
class Laporan_model extends CI_Model
{
    public function getReportsByDate($start_date, $end_date)
    {
        $this->db->select('products_all.models,products_all.collor,laporan_barang.tanggal,laporan_barang.barcode,laporan_barang.jenis, SUM(laporan_barang.jumlah) as total_jumlah');
        $this->db->from('laporan_barang');
        $this->db->join('products_all', 'products_all.barcode = laporan_barang.barcode', 'left');

        $this->db->group_by('barcode,tanggal');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('jenis =', 'MASUK');
        $query = $this->db->get();
        return $query->result();
    }
    public function getkeluar($start_date, $end_date)
    {
        $this->db->select('products_all.models,products_all.collor,laporan_barang.tanggal,laporan_barang.barcode,laporan_barang.jenis, SUM(laporan_barang.jumlah) as total_jumlah');
        $this->db->from('laporan_barang');
        $this->db->join('products_all', 'products_all.barcode = laporan_barang.barcode', 'left');

        $this->db->group_by('barcode,tanggal');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->where('jenis =', 'KELUAR');
        $query = $this->db->get();
        return $query->result();
    }
    public function getLaporanByBulan($bulan)
    {
        $this->db->select('products_all.models,products_all.collor,products_all.jumlah,laporan_barang.tanggal,laporan_barang.barcode,laporan_barang.jenis, SUM(laporan_barang.jumlah) as total_jumlah');
        $this->db->from('laporan_barang');
        $this->db->join('products_all', 'products_all.barcode = laporan_barang.barcode', 'left');

        $this->db->group_by('barcode');
        $this->db->where('MONTH(tanggal)', $bulan);

        // $this->db->where('jenis =', 'KELUAR');
        $query = $this->db->get();
        return $query->result();
    }
}
