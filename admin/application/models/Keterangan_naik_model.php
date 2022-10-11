<?php

class Keterangan_naik_model extends CI_Model
{
  private $_table = 'tb_keterangan_naik';

  public function rules()
  {
    return [
      [
        'field' => 'keterangan',
        'label' => 'Keterangan',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'status',
        'label' => 'Kenaikan',
        'rules' => 'required',
        'errors' => []
      ],
      [
        'field' => 'id_kelas',
        'label' => 'Kelas',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'is_active',
        'label' => 'Status',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
    ];
  }

  public function get()
  {
    $query = $this->db
      ->select('a.*, b.tingkat, b.jurusan')
      ->from($this->_table . ' a')
      ->join('tb_kelas b', 'a.id_kelas = b.id_kelas')
      ->order_by('a.is_active', 'DESC')
      ->get();
    return $query->result();
  }

  public function find_by_id($id_keterangan_naik)
  {
    if (!$id_keterangan_naik) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_keterangan_naik' => $id_keterangan_naik));
    return $query->row();
  }

  public function insert($keterangan_naik)
  {
    if (!$keterangan_naik) {
      return;
    }

    return $this->db->insert($this->_table, $keterangan_naik);
  }

  public function update($keterangan_naik)
  {
    if (!isset($keterangan_naik['id_keterangan_naik'])) {
      return;
    }

    $find_keterangan_naik = $this->find_by_id($keterangan_naik['id_keterangan_naik']);
    if (!isset($find_keterangan_naik)) {
      return;
    }

    return $this->db->update($this->_table, $keterangan_naik, ['id_keterangan_naik' => $keterangan_naik['id_keterangan_naik']]);
  }
}
