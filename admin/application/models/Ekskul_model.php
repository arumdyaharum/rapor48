<?php

class Ekskul_model extends CI_Model
{
  private $_table = 'tb_ekskul';

  public function rules()
  {
    return [
      [
        'field' => 'nama_ekskul',
        'label' => 'Nama Ekskul',
        'rules' => 'trim|required',
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

  public function find_by_id($id_ekskul)
  {
    if (!$id_ekskul) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_ekskul' => $id_ekskul));
    return $query->row();
  }

  public function insert($ekskul)
  {
    if (!$ekskul) {
      return;
    }

    return $this->db->insert($this->_table, $ekskul);
  }

  public function update($ekskul)
  {
    if (!isset($ekskul['id_ekskul'])) {
      return;
    }

    $find_ekskul = $this->find_by_id($ekskul['id_ekskul']);
    if (!isset($find_ekskul)) {
      return;
    }

    return $this->db->update($this->_table, $ekskul, ['id_ekskul' => $ekskul['id_ekskul']]);
  }
}
