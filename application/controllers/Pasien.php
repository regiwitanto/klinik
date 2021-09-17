<?php

class Pasien extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }

    $this->load->library('form_validation');
    $this->load->model('Pasien_model', 'pasien');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['judul'] = 'Data Pasien';

    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      if (!($this->uri->segment(2))) {
        $data['keyword'] = $this->session->unset_userdata('keyword');
      }
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $this->db->like('pasien_nama', $data['keyword']);
    $this->db->or_like('no_lab', $data['keyword']);
    $this->db->from('pasien');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 10;

    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);
    $data['pasien'] = $this->pasien->getPasien($config['per_page'], $data['start'], $data['keyword']);
    $this->load->view('templates/header', $data);
    $this->load->view('pasien/index');
    $this->load->view('templates/footer');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Data Pasien';
    $data['pasien'] = $this->pasien->getPasienById($id);
    $this->load->view('templates/header', $data);
    $this->load->view('pasien/detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Tambah Data Pasien';
    $data['dokter'] = $this->pasien->getDokter();
    $data['pemeriksaan'] = $this->pasien->getPemeriksaan();

    $this->form_validation->set_rules('pasien_nama', 'Nama Pasien', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('no_lab', 'Nomor Lab', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'numeric');
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'numeric');
    $this->form_validation->set_rules('pengirim', 'Nama Pengirim', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('status_hasil', 'Status Hasil', 'required');
    $this->form_validation->set_rules('dokter_id', 'Dokter Penanggung Jawab', 'required');
    $this->form_validation->set_rules('pemeriksaan_id', 'Hasil Pemeriksaan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('pasien/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pasien->tambahDataPasien();
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect('pasien');
    }
  }

  public function hapus($id)
  {
    $this->pasien->hapusDataPasien($id);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('pasien');
  }

  public function ubah($id)
  {
    $data['judul'] = 'Ubah Data Pasien';
    $data['pasien'] = $this->pasien->getPasienById($id);
    $data['dokter'] = $this->pasien->getDokter();
    $data['pemeriksaan'] = $this->pasien->getPemeriksaan();

    $this->form_validation->set_rules('pasien_nama', 'Nama Pasien', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('no_lab', 'Nomor Lab', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'numeric');
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'numeric');
    $this->form_validation->set_rules('pengirim', 'Nama Pengirim', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('status_hasil', 'Status Hasil', 'required');
    $this->form_validation->set_rules('dokter_id', 'Dokter Penanggung Jawab', 'required');
    $this->form_validation->set_rules('pemeriksaan_id', 'Hasil Pemeriksaan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('pasien/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pasien->ubahDataPasien();
      $this->session->set_flashdata('flash', 'Diubah');
      redirect('pasien');
    }
  }

  public function cetak($id)
  {
    $data['judul'] = 'Cetak Data Pasien';
    $data['pasien'] = $this->pasien->getPasienById($id);
    $pasien = $data['pasien'];
    $pemeriksaanId = $pasien['pemeriksaan_id'];
    ($pemeriksaanId == "2") ? $pemeriksaanId = "1" : $pemeriksaanId = "2";
    $data['pemeriksaan'] = $this->pasien->getPemeriksaanById($pemeriksaanId);
    $pemeriksaanData = $data['pemeriksaan'];
    $data['nilai_rujukan_2'] = $pemeriksaanData['nilai_rujukan'];
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['name'] = $data['user']['name'];

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'portrait');
    $this->pdf->filename = $pasien['no_lab'] . " - " . $pasien['pasien_nama'];
    $this->pdf->load_view('pasien/cetak', $data);
  }
}
