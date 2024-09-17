<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login' && $this->session->userdata('status') != 'guru_login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['soal'] = $this->m_data->get_data('tb_matapelajaran')->result();
        $this->load->view('admin/v_soal', $data);
    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_matapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        $this->form_validation->set_rules('a', 'Jawaban A', 'required');
        $this->form_validation->set_rules('b', 'Jawaban B', 'required');
        $this->form_validation->set_rules('c', 'Jawaban C', 'required');
        $this->form_validation->set_rules('d', 'Jawaban D', 'required');
        $this->form_validation->set_rules('e', 'Jawaban E', 'required');
        $this->form_validation->set_rules('kunci', 'Kunci Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Maaf, Input Soal Gagal!</h4> Mata Kuliah dan Pertanyaan Soal tidak boleh dikosongkan.</div>');
            redirect(base_url('soal'));
        } else {
            $data = array(
                'id_matapelajaran' => $this->input->post('nama_matapelajaran'),
                'pertanyaan' => $this->input->post('soal'),
                'a' => $this->input->post('a'),
                'b' => $this->input->post('b'),
                'c' => $this->input->post('c'),
                'd' => $this->input->post('d'),
                'e' => $this->input->post('e'),
                'kunci_jawaban' => $this->input->post('kunci')
            );

            $this->m_data->insert_data($data, 'tb_soal_ujian');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal berhasil dibuat!</h4>untuk melihat soal tersebut bisa anda lihat di menu <b>Daftar Soal ujian</b>.</div>');
            redirect(base_url('soal'));
        }
    }
}
