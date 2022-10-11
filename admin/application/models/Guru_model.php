<?php

class Guru_model extends CI_Model
{
  private $_table = 'tb_guru';

  public function rules()
  {
    return [
      [
        'field' => 'nip',
        'label' => 'NIP',
        'rules' => 'trim|required|max_length[50]',
        'errors' => []
      ],
      [
        'field' => 'nama_guru',
        'label' => 'Nama Guru',
        'rules' => 'trim|required',
        'errors' => []
      ],
      // [
      //   'field' => 'username',
      //   'label' => 'Username',
      //   'rules' => 'trim|required|max_length[20]|is_unique[tb_siswa.username]',
      //   'errors' => []
      // ],
      [
        'field' => 'pass',
        'label' => 'Password',
        'rules' => 'trim|required|max_length[20]',
        'errors' => []
      ],
    ];
  }

  public function get()
  {
    $query = $this->db->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_guru)
  {
    if (!$id_guru) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_guru' => $id_guru));
    return $query->row();
  }

  public function find_other_username($id_guru, $username)
  {
    if (!$username || !$id_guru) {
      return;
    }

    $query = $this->db
      ->where('username', $username)
      ->where_not_in('id_guru', [$id_guru])
      ->get($this->_table);
    return $query->row();
  }

  public function insert($guru)
  {
    if (!$guru) {
      return;
    }

    return $this->db->insert($this->_table, $guru);
  }

  public function update($guru)
  {
    if (!isset($guru['id_guru'])) {
      return;
    }

    $find_guru = $this->find_by_id($guru['id_guru']);
    if (!isset($find_guru)) {
      return;
    }

    return $this->db->update($this->_table, $guru, ['id_guru' => $guru['id_guru']]);
  }
}
