<?php

class Peringkat_model extends CI_Model
{
  private $_table = 'tb_peringkat';

  public function rules()
  {
    return [
      [
        'field' => 'peringkat',
        'label' => 'Peringkat',
        'rules' => 'trim|required|max_length[5]',
        'errors' => []
      ],
      [
        'field' => 'batas_bawah',
        'label' => 'Batas Bawah',
        'rules' => 'trim|required|numeric|max_length[3]|is_natural',
        'errors' => []
      ],
      [
        'field' => 'batas_atas',
        'label' => 'Batas Atas',
        'rules' => 'trim|required|numeric|max_length[3]|is_natural',
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
    $query = $this->db->order_by('is_active', 'DESC')->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_peringkat)
  {
    if (!$id_peringkat) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_peringkat' => $id_peringkat));
    return $query->row();
  }

  public function insert($peringkat)
  {
    if (!$peringkat) {
      return;
    }

    return $this->db->insert($this->_table, $peringkat);
  }

  public function update($peringkat)
  {
    if (!isset($peringkat['id_peringkat'])) {
      return;
    }

    $find_peringkat = $this->find_by_id($peringkat['id_peringkat']);
    if (!isset($find_peringkat)) {
      return;
    }

    return $this->db->update($this->_table, $peringkat, ['id_peringkat' => $peringkat['id_peringkat']]);
  }
}
