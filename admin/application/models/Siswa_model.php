<?php

class Siswa_model extends CI_Model
{
  private $_table = 'tb_siswa';

  public function rules()
  {
    return [
      [
        'field' => 'nis',
        'label' => 'NIS',
        'rules' => 'trim|required|max_length[50]',
        'errors' => []
      ],
      [
        'field' => 'nama_siswa',
        'label' => 'Nama Siswa',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'id_kelas_awal',
        'label' => 'Kelas Awal',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'angkatan',
        'label' => 'Angkatan',
        'rules' => 'trim|required|numeric|exact_length[4]|is_natural',
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
      [
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'required',
        'errors' => []
      ],
    ];
  }

  public function get()
  {
    $query = $this->db->get($this->_table);
    return $query->result();
  }

  public function get_angkatan_list()
  {
    $query = $this->db
      ->select('angkatan, COUNT(angkatan) AS jumlah_siswa')
      ->group_by("angkatan")
      ->order_by('angkatan', 'DESC')
      ->get($this->_table);
    return $query->result();
  }

  public function get_siswa_angkatan($angkatan)
  {
    if (!$angkatan) {
      return;
    }
    $query = $this->db
      ->select('a.id_siswa, a.id_siswa, a.nis, a.nama_siswa, b.tingkat awal_tingkat, b.jurusan awal_jurusan, c.tingkat akhir_tingkat, c.jurusan akhir_jurusan, a.status, a.username')
      ->from($this->_table . ' a')
      ->join('tb_kelas b', 'a.id_kelas_awal = b.id_kelas')
      ->join('tb_kelas c', 'a.id_kelas_akhir = c.id_kelas', 'left')
      ->where('a.angkatan', $angkatan)
      ->order_by('a.nama_siswa', 'ASC')
      ->get();
    return $query->result();
  }

  public function find_by_id($id_siswa)
  {
    if (!$id_siswa) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_siswa' => $id_siswa));
    return $query->row();
  }

  public function find_other_username($id_siswa, $username)
  {
    if (!$username || !$id_siswa) {
      return;
    }

    $query = $this->db
      ->where('username', $username)
      ->where_not_in('id_siswa', [$id_siswa])
      ->get($this->_table);
    return $query->row();
  }

  public function insert($siswa)
  {
    if (!$siswa) {
      return;
    }

    return $this->db->insert($this->_table, $siswa);
  }

  public function update($siswa)
  {
    if (!isset($siswa['id_siswa'])) {
      return;
    }

    $find_siswa = $this->find_by_id($siswa['id_siswa']);
    if (!isset($find_siswa)) {
      return;
    }

    return $this->db->update($this->_table, $siswa, ['id_siswa' => $siswa['id_siswa']]);
  }
}
