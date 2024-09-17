<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Mengecek status login pengguna
        if ($this->session->userdata('status') != 'admin_login' && 
            $this->session->userdata('status') != 'guru_login' && 
            $this->session->userdata('status') != 'siswa_login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        // Validasi form untuk password baru
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Silahkan Masukan Password Baru Anda!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password Harus Lebih dari 6 Karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|matches[password1]');

        // Jika validasi gagal, muat ulang form sesuai dengan status pengguna
        if ($this->form_validation->run() == false) {
            if ($this->session->userdata('status') == 'admin_login') {
                $this->load->view('admin/v_password');
            } elseif ($this->session->userdata('status') == 'guru_login') {
                $this->load->view('admin/v_password_guru');
            } elseif ($this->session->userdata('status') == 'siswa_login') {
                $this->load->view('siswa/v_password');
            }
        } else {
            // Jika validasi berhasil, ubah password
            $this->ubah_password();
        }
    }

    private function ubah_password()
    {
        // Mengambil password baru dari input
        $password_baru = $this->input->post('password1');
        $user_id = $this->session->userdata('id');
        $status = $this->session->userdata('status');

        // Data password yang akan diupdate
        $data = ['password' => $password_baru];

        // Memilih tabel yang tepat berdasarkan status pengguna
        if ($status == 'admin_login') {
            $where = ['id' => $user_id];
            $this->m_data->update_data($where, $data, 'tb_admin');
        } elseif ($status == 'guru_login') {
            $where = ['id_guru' => $user_id];
            $this->m_data->update_data($where, $data, 'tb_guru');
        } elseif ($status == 'siswa_login') {
            $where = ['id_siswa' => $user_id];
            $this->m_data->update_data($where, $data, 'tb_siswa');
        }

        // Menampilkan pesan sukses dan mengarahkan kembali ke halaman password
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Sukses!<br></b> Password anda berhasil diganti</div>');
        redirect(base_url('password'));
    }
}
