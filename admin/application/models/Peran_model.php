<?php

class Peran_model extends CI_Model
{
  private $_table = 'tb_peran';

  public function rules()
  {
    return [
      [
        'field' => 'nama_peran',
        'label' => 'Nama Peran',
        'rules' => 'trim|required',
        'errors' => []
      ],
      [
        'field' => 'is_walas',
        'label' => 'Wali Kelas',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_nilai',
        'label' => 'Nilai Akademik',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_akademik',
        'label' => 'Catatan Akademik',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_prakerin',
        'label' => 'Pratik Kerja Lapangan',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_ekskul',
        'label' => 'Kegiatan Ekstra Kurikuler',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_absensi',
        'label' => 'Ketidakhadiran',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_kenaikan',
        'label' => 'Kenaikan Kelas',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_karakter',
        'label' => 'Perkembangan Karakter',
        'rules' => 'required|numeric|is_natural',
        'errors' => []
      ],
      [
        'field' => 'do_leger',
        'label' => 'Leger dan Rapor',
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
    $query = $this->db->order_by('is_active', 'DESC')->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_peran)
  {
    if (!$id_peran) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_peran' => $id_peran));
    return $query->row();
  }

  public function insert($peran)
  {
    if (!$peran) {
      return;
    }

    return $this->db->insert($this->_table, $peran);
  }

  public function update($peran)
  {
    if (!isset($peran['id_peran'])) {
      return;
    }

    $find_peran = $this->find_by_id($peran['id_peran']);
    if (!isset($find_peran)) {
      return;
    }

    return $this->db->update($this->_table, $peran, ['id_peran' => $peran['id_peran']]);
  }
}
