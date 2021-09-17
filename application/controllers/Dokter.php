<?php

class Dokter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }

    $this->load->library('form_validation');
    $this->load->model('Dokter_model', 'dokter');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['judul'] = 'Data Dokter';

    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      if (!($this->uri->segment(2))) {
        $data['keyword'] = $this->session->unset_userdata('keyword');
      }
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $this->db->like('dokter_nama', $data['keyword']);
    $this->db->from('dokter');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 10;

    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);
    $data['dokter'] = $this->dokter->getDokter($config['per_page'], $data['start'], $data['keyword']);
    $this->load->view('templates/header', $data);
    $this->load->view('dokter/index');
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Data Dokter';
    $data['dokter'] = $this->dokter->getDokterById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('dokter/detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah Data Dokter';
    // $data['dokter'] = $this->dokter->getDokter();
    // $data['pemeriksaan'] = $this->dokter->getPemeriksaan();

    $this->form_validation->set_rules('dokter_nama', 'Nama Dokter', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('dokter/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->dokter->tambahDataDokter();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('dokter');
    }
  }

  public function hapus($id)
  {
    $this->dokter->hapusDataDokter($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('dokter');
  }

  public function ubah($id)
  {
    $data['judul'] = 'Ubah Data Dokter';
    $data['dokter'] = $this->dokter->getDokterById($id);
    // $data['dokter'] = $this->dokter->getDokter();
    // $data['pemeriksaan'] = $this->dokter->getPemeriksaan();

    $this->form_validation->set_rules('dokter_nama', 'Nama Dokter', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('dokter/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->dokter->ubahDataDokter();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('dokter');
    }
  }
}
