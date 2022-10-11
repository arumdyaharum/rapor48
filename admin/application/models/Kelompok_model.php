<?php

class Kelompok_model extends CI_Model
{
  private $_table = 'tb_kelompok';

  public function rules()
  {
    return [
      [
        'field' => 'deskripsi',
        'label' => 'Deskripsi',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'pengetahuan_persen',
        'label' => 'Persentase Pengetahuan',
        'rules' => 'trim|required|numeric|max_length[3]|is_natural',
        'errors' => []
      ],
      [
        'field' => 'keterampilan_persen',
        'label' => 'Persentase Keterampilan',
        'rules' => 'trim|required|numeric|max_length[3]|is_natural',
        'errors' => []
      ],
      [
        'field' => 'desimal',
        'label' => 'Desimal',
        'rules' => 'trim|required|numeric|max_length[5]|is_natural',
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
      ->order_by('is_active', 'DESC')
      ->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_kelompok)
  {
    if (!$id_kelompok) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_kelompok' => $id_kelompok));
    return $query->row();
  }

  public function insert($kelompok)
  {
    if (!$kelompok) {
      return;
    }

    return $this->db->insert($this->_table, $kelompok);
  }

  public function update($kelompok)
  {
    if (!isset($kelompok['id_kelompok'])) {
      return;
    }

    $find_kelompok = $this->find_by_id($kelompok['id_kelompok']);
    if (!isset($find_kelompok)) {
      return;
    }

    return $this->db->update($this->_table, $kelompok, ['id_kelompok' => $kelompok['id_kelompok']]);
  }
}
