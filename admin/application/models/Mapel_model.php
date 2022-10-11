<?php

class Mapel_model extends CI_Model
{
  private $_table = 'tb_mapel';

  public function rules()
  {
    return [
      [
        'field' => 'nama_mapel',
        'label' => 'Nama Mapel',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'id_kelompok',
        'label' => 'Kelompok Mapel',
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
      ->select('a.*, b.deskripsi')
      ->from($this->_table . ' a')
      ->join('tb_kelompok b', 'a.id_kelompok = b.id_kelompok')
      ->order_by('a.is_active', 'DESC')
      ->get();
    return $query->result();
  }

  public function find_by_id($id_mapel)
  {
    if (!$id_mapel) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_mapel' => $id_mapel));
    return $query->row();
  }

  public function insert($mapel)
  {
    if (!$mapel) {
      return;
    }

    return $this->db->insert($this->_table, $mapel);
  }

  public function update($mapel)
  {
    if (!isset($mapel['id_mapel'])) {
      return;
    }

    $find_mapel = $this->find_by_id($mapel['id_mapel']);
    if (!isset($find_mapel)) {
      return;
    }

    return $this->db->update($this->_table, $mapel, ['id_mapel' => $mapel['id_mapel']]);
  }
}
