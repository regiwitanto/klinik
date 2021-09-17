  <?php

  class Pasien_model extends CI_Model
  {
    public function getAllPasien()
    {
      return $this->db->get('pasien')->result_array();
    }

    public function getPasien($limit, $start, $keyword = null)
    {
      $this->db->order_by('pasien_id', 'desc');

      if ($keyword) {
        $this->db->like('pasien_nama', $keyword);
        $this->db->or_like('no_lab', $keyword);
      }

      return $this->db->get('pasien', $limit, $start)->result_array();
    }

    public function countAllPasien()
    {
      return $this->db->get('pasien')->num_rows();
    }

    public function getPasienById($id)
    {
      $this->db->select('pasien.*, dokter.dokter_nama, pemeriksaan.jenis, pemeriksaan.nama, pemeriksaan.hasil, pemeriksaan.nilai_rujukan');
      $this->db->from('pasien');
      $this->db->join('dokter', 'dokter.dokter_id = pasien.dokter_id');
      $this->db->join('pemeriksaan', 'pemeriksaan.pemeriksaan_id = pasien.pemeriksaan_id');
      $this->db->where('pasien_id', $id);

      return $this->db->get()->row_array();
    }

    public function getDokter()
    {
      return $this->db->get('dokter')->result_array();
    }

    public function getPemeriksaan()
    {
      return $this->db->get('pemeriksaan')->result_array();
    }

    public function getPemeriksaanById($id)
    {
      $this->db->select('pemeriksaan.*');
      $this->db->from('pemeriksaan');
      $this->db->where('pemeriksaan_id', $id);

      return $this->db->get()->row_array();
    }

    public function tambahDataPasien()
    {
      $data = [
        "pasien_nama" => $this->input->post('pasien_nama', true),
        "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
        "no_lab" => $this->input->post('no_lab', true),
        "tanggal" => $this->input->post('tanggal', true),
        "no_telp" => $this->input->post('no_telp', true),
        "no_hp" => $this->input->post('no_hp', true),
        "pengirim" => $this->input->post('pengirim', true),
        "alamat" => $this->input->post('alamat', true),
        "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
        "status_hasil" => $this->input->post('status_hasil', true),
        "dokter_id" => $this->input->post('dokter_id', true),
        "pemeriksaan_id" => $this->input->post('pemeriksaan_id', true),
      ];

      $this->db->insert('pasien', $data);
    }

    public function hapusDataPasien($id)
    {
      $this->db->delete('pasien', ['pasien_id' => $id]);
    }

    public function ubahDataPasien()
    {
      $data = [
        "pasien_nama" => $this->input->post('pasien_nama', true),
        "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
        "no_lab" => $this->input->post('no_lab', true),
        "tanggal" => $this->input->post('tanggal', true),
        "no_telp" => $this->input->post('no_telp', true),
        "no_hp" => $this->input->post('no_hp', true),
        "pengirim" => $this->input->post('pengirim', true),
        "alamat" => $this->input->post('alamat', true),
        "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
        "status_hasil" => $this->input->post('status_hasil', true),
        "dokter_id" => $this->input->post('dokter_id', true),
        "pemeriksaan_id" => $this->input->post('pemeriksaan_id', true),
      ];

      $this->db->where('pasien_id', $this->input->post('pasien_id'));
      $this->db->update('pasien', $data);
    }
  }
