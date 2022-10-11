<?php

class Tahun_ajar_model extends CI_Model
{
  private $_table = 'tb_tahun_ajar';

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
    $query = $this->db->get($this->_table);
    return $query->result();
  }

  public function find_by_id($id_tahun_ajar)
  {
    if (!$id_tahun_ajar) {
      return;
    }

    $query = $this->db->get_where($this->_table, array('id_tahun_ajar' => $id_tahun_ajar));
    return $query->row();
  }

  public function insert($tahun_ajar)
  {
    if (!$tahun_ajar) {
      return;
    }

    return $this->db->insert($this->_table, $tahun_ajar);
  }

  public function update($tahun_ajar)
  {
    if (!isset($tahun_ajar['id_tahun_ajar'])) {
      return;
    }

    return $this->db->update($this->_table, $tahun_ajar, ['id_tahun_ajar' => $tahun_ajar['id_tahun_ajar']]);
  }

  /*   create table (copy data)
  *    - create_uniqid_kelompok($uniqid)
  *    - create_uniqid_mapel($uniqid)
  *    - create_uniqid_keterangan_naik($uniqid)
  *    - create_uniqid_peringkat($uniqid)
  *    - create_uniqid_ekskul($uniqid)
  *    - create_uniqid_peran($uniqid)
  *    
  *    create table (main data)
  *    - create_uniqid_peran_guru($uniqid)
  *    - create_uniqid_guru_ajar($uniqid)
  *    - create_uniqid_mapel_ajar($uniqid)
  *    - create_uniqid_prakerin($uniqid)
  *    - create_uniqid_absensi($uniqid)
  *    - create_uniqid_ekskul_ajar($uniqid)
  *    - create_uniqid_karakter($uniqid)
  *    - create_uniqid_kenaikan($uniqid)
  *    - create_uniqid_akademik($uniqid)
  *    - create_uniqid_keterampilan($uniqid)
  *    - create_uniqid_pengetahuan($uniqid)
  */

  public function create_uniqid_kelompok($uniqid)
  {
    $fields = array(
      'id_kelompok' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'deskripsi' => array(
        'type' => 'TEXT',
      ),
      'pengetahuan_persen' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'keterampilan_persen' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'desimal' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'no_urut' => array(
        'type' => 'INT',
        'constraint' => 10,
        'null' => TRUE,
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_kelompok', TRUE);
    $this->dbforge->create_table($uniqid . '_kelompok', TRUE);
  }

  public function create_uniqid_mapel($uniqid)
  {
    $fields = array(
      'id_mapel' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'nama_mapel' => array(
        'type' => 'TEXT',
      ),
      'id_kelompok' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_mapel', TRUE);
    $this->dbforge->create_table($uniqid . '_mapel', TRUE);
  }

  public function create_uniqid_keterangan_naik($uniqid)
  {
    $fields = array(
      'id_keterangan_naik' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'status' => array(
        'type' => 'VARCHAR',
        'constraint' => 10
      ),
      'id_kelas' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'keterangan' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_keterangan_naik', TRUE);
    $this->dbforge->create_table($uniqid . '_keterangan_naik', TRUE);
  }

  public function create_uniqid_peringkat($uniqid)
  {
    $fields = array(
      'id_peringkat' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'batas_bawah' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'batas_atas' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'peringkat' => array(
        'type' => 'VARCHAR',
        'constraint' => 5
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_keterangan_naik', TRUE);
    $this->dbforge->create_table($uniqid . '_keterangan_naik', TRUE);
  }

  public function create_uniqid_ekskul($uniqid)
  {
    $fields = array(
      'id_ekskul' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'nama_ekskul' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_ekskul', TRUE);
    $this->dbforge->create_table($uniqid . '_ekskul', TRUE);
  }

  public function create_uniqid_peran($uniqid)
  {
    $fields = array(
      'id_peran' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'nama_peran' => array(
        'type' => 'TEXT'
      ),
      'is_walas' => array(
        'type' => 'BOOLEAN'
      ),
      'do_nilai' => array(
        'type' => 'BOOLEAN'
      ),
      'do_akademik' => array(
        'type' => 'BOOLEAN'
      ),
      'do_prakerin' => array(
        'type' => 'BOOLEAN'
      ),
      'do_ekskul' => array(
        'type' => 'BOOLEAN'
      ),
      'do_absensi' => array(
        'type' => 'BOOLEAN'
      ),
      'do_kenaikan' => array(
        'type' => 'BOOLEAN'
      ),
      'do_karakter' => array(
        'type' => 'BOOLEAN'
      ),
      'do_leger' => array(
        'type' => 'BOOLEAN'
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_peran', TRUE);
    $this->dbforge->create_table($uniqid . '_peran', TRUE);
  }

  public function create_uniqid_peran_guru($uniqid)
  {
    $fields = array(
      'id_peran_guru' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_guru' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_peran' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'id_kelas_walas' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_peran_guru', TRUE);
    $this->dbforge->create_table($uniqid . '_peran_guru', TRUE);
  }

  public function create_uniqid_guru_ajar($uniqid)
  {
    $fields = array(
      'id_guru_ajar' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_guru' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_mapel_ajar' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_guru_ajar', TRUE);
    $this->dbforge->create_table($uniqid . '_guru_ajar', TRUE);
  }

  public function create_uniqid_mapel_ajar($uniqid)
  {
    $fields = array(
      'id_mapel_ajar' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_mapel' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'id_kelas' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'no_urut' => array(
        'type' => 'INT',
        'constraint' => 10,
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_mapel_ajar', TRUE);
    $this->dbforge->create_table($uniqid . '_mapel_ajar', TRUE);
  }

  public function create_uniqid_prakerin($uniqid)
  {
    $fields = array(
      'id_prakerin' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'mitra' => array(
        'type' => 'TEXT',
      ),
      'lokasi' => array(
        'type' => 'TEXT',
      ),
      'durasi' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'keterangan' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_prakerin', TRUE);
    $this->dbforge->create_table($uniqid . '_prakerin', TRUE);
  }

  public function create_uniqid_absensi($uniqid)
  {
    $fields = array(
      'id_absensi' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'sakit' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'izin' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'tanpa_ket' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_absensi', TRUE);
    $this->dbforge->create_table($uniqid . '_absensi', TRUE);
  }

  public function create_uniqid_ekskul_ajar($uniqid)
  {
    $fields = array(
      'id_ekskul_ajar' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_ekskul' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'catatan' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_ekskul_ajar', TRUE);
    $this->dbforge->create_table($uniqid . '_ekskul_ajar', TRUE);
  }

  public function create_uniqid_karakter($uniqid)
  {
    $fields = array(
      'id_karakter' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'ket_karakter' => array(
        'type' => 'TEXT',
      ),
      'ket_integritas' => array(
        'type' => 'TEXT',
      ),
      'ket_religius' => array(
        'type' => 'TEXT',
      ),
      'ket_nasionalis' => array(
        'type' => 'TEXT',
      ),
      'ket_mandiri' => array(
        'type' => 'TEXT',
      ),
      'ket_gotong' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_ekskul_ajar', TRUE);
    $this->dbforge->create_table($uniqid . '_ekskul_ajar', TRUE);
  }

  public function create_uniqid_kenaikan($uniqid)
  {
    $fields = array(
      'id_kenaikan' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_keterangan_naik' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_kenaikan', TRUE);
    $this->dbforge->create_table($uniqid . '_kenaikan', TRUE);
  }

  public function create_uniqid_akademik($uniqid)
  {
    $fields = array(
      'id_akademik' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'ket_akademik' => array(
        'type' => 'TEXT',
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_akademik', TRUE);
    $this->dbforge->create_table($uniqid . '_akademik', TRUE);
  }

  public function create_uniqid_keterampilan($uniqid)
  {
    $fields = array(
      'id_keterampilan' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_guru_ajar' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'portofolio' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'proyek' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'kinerja' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_keterampilan', TRUE);
    $this->dbforge->create_table($uniqid . '_keterampilan', TRUE);
  }

  public function create_uniqid_pengetahuan($uniqid)
  {
    $fields = array(
      'id_pengetahuan' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'id_siswa' => array(
        'type' => 'INT',
        'constraint' => 255
      ),
      'id_guru_ajar' => array(
        'type' => 'INT',
        'constraint' => 10
      ),
      'uts' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'uas' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
      'nilai_harian' => array(
        'type' => 'INT',
        'constraint' => 5
      ),
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id_pengetahuan', TRUE);
    $this->dbforge->create_table($uniqid . '_pengetahuan', TRUE);
  }
}
