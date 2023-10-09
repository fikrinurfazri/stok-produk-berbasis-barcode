<?php

class Auth_model extends CI_Model
{
    private $_table = "admin";
    const SESSION_KEY = 'id_admin';

    public function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username or Email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[255]'
            ]
        ];
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_table);
        $admin = $query->row();

        // cek apakah user sudah terdaftar?
        if (!$admin) {
            return FALSE;
        }

        // cek apakah passwordnya benar?
        if (!password_verify($password, $admin->password)) {
            return FALSE;
        }

        // bikin session
        $this->session->set_userdata([self::SESSION_KEY => $admin->id_admin]);
        $this->_update_last_login($admin->id_admin);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $id_admin = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['id_admin' => $id_admin]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }

    private function _update_last_login($id)
    {
        $id_admin = $this->session->userdata(self::SESSION_KEY);
        $data = [
            'last_login' => date("Y-m-d H:i:s"),
        ];

        return $this->db->update($this->_table, $data, ['id_admin' => $id_admin]);
    }
}
