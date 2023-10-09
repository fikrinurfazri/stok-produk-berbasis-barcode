<?php
class Karyawan extends CI_Controller
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
            'title'  => "PENGELOLAAN KARYAWAN",
            'user'   => $this->user_model->getuser(),
            'admin' => $this->db->get('admin')->result()

        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/karyawan/index', $data);
        $this->load->view('pages/footer');
    }

    public function proses()
    {
        // Validasi input
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('kon_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            redirect('karyawan');
        } else {
            // Data valid, simpan pengguna ke database
            $data = array(
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            $this->db->insert('admin', $data);
            // Redirect ke halaman sukses
            $this->form_validation->set_message('<div class="alert alert-success text-center" role="alert">
 Berhasil, Silahkan Login!
</div>');

            redirect('karyawan');
        }
    }
}
