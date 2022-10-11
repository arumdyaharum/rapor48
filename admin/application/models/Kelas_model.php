<?php

class Kelas_model extends CI_Model
{
  private $_table = 'tb_kelas';

  public function rules()
  {
    return [
      [
        'field' => 'jurusan',
        'label' => 'Jurusan',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'is_active',
        'label' => 'Status',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ]
    ];
  }

  public function get()
  {
    $query = $this->db->order_by('is_active', 'DESC')->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_kelas)
  {
    if (!$id_kelas) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_kelas' => $id_kelas));
    return $query->row();
  }

  public function find_by_tingkat($tingkat, $active = TRUE)
  {
    if (!$tingkat) {
      return;
    }

    $query = $this->db
      ->where('tingkat', $tingkat)
      ->where('is_active', $active)
      ->get($this->_table);
    return $query->result();
  }

  public function find_last_kelas_by_id_siswa($id_siswa)
  {
    if (!$id_siswa) {
      return;
    }

    $query_join = $this->db
      ->select('id_kelas, MAX(id_siswa_kelas)')
      ->where('id_siswa', $id_siswa)
      ->group_by('id_kelas')
      ->get_compiled_select('tb_siswa_kelas');

    $query = $this->db
      ->select('a.tingkat, a.jurusan')
      ->from($this->_table . ' a')
      ->join('(' . $query_join . ') b', 'a.id_kelas = b.id_kelas')
      ->get();

    return $query->row();
  }

  public function insert($kelas)
  {
    if (!$kelas) {
      return;
    }

    return $this->db->insert($this->_table, $kelas);
  }

  public function bulk_insert($kelas)
  {
    $this->db->trans_start();
    foreach ($kelas['tingkat'] as $key => $value) {
      $kelas_new = [
        'tingkat' => $value,
        'jurusan' => $kelas['jurusan'],
        'is_active' => $kelas['is_active']
      ];
      $this->db->insert($this->_table, $kelas_new);
    }
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update($kelas)
  {
    if (!isset($kelas['id_kelas'])) {
      return;
    }

    $find_kelas = $this->find_by_id($kelas['id_kelas']);
    if (!isset($find_kelas)) {
      return;
    }

    return $this->db->update($this->_table, $kelas, ['id_kelas' => $kelas['id_kelas']]);
  }
}
