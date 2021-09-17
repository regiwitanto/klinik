<?php

class Dokter_model extends CI_Model
{
  public function getAllDokter()
  {
    return $this->db->get('dokter')->result_array();
  }

  public function getDokter($limit, $start, $keyword = null)
  {
    $this->db->order_by('dokter_id', 'desc');

    if ($keyword) {
      $this->db->like('dokter_nama', $keyword);
    }

    return $this->db->get('dokter', $limit, $start)->result_array();
  }

  public function countAllDokter()
  {
    return $this->db->get('dokter')->num_rows();
  }

  public function getDokterById($id)
  {
    $this->db->select('dokter.*');
    $this->db->from('dokter');
    $this->db->where('dokter_id', $id);

    return $this->db->get()->row_array();
  }

  public function tambahDataDokter()
  {
    $data = [
      "dokter_nama" => $this->input->post('dokter_nama', true),
    ];

    $this->db->insert('dokter', $data);
  }

  public function hapusDataDokter($id)
  {
    $this->db->delete('dokter', ['dokter_id' => $id]);
  }

  public function ubahDataDokter()
  {
    $data = [
      "dokter_nama" => $this->input->post('dokter_nama', true),
    ];

    $this->db->where('dokter_id', $this->input->post('dokter_id'));
    $this->db->update('dokter', $data);
  }
}
