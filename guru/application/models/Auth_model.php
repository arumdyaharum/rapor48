<?php

class Auth_model extends CI_Model
{
  private $_table = 'tb_guru';
  const SESSION_KEY = 'id_guru';

  public function rules()
  {
    return [
      [
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required',
        'errors' => []
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|max_length[20]',
        'errors' => []
      ]
    ];
  }

  public function login($username, $password)
  {
    if (!$username || !$password) {
      return FALSE;
    }

    $this->db->where('username', $username);
    $query = $this->db->get($this->_table);
    $user = $query->row();

    // cek apakah user sudah terdaftar?
    if (!$user) {
      return FALSE;
    }

    // cek apakah passwordnya benar?
    if (!password_verify($password, $user->password)) {
      return FALSE;
    }

    // bikin session
    $this->session->set_userdata([self::SESSION_KEY => $user->id_guru]);

    return $this->session->has_userdata(self::SESSION_KEY);
  }

  public function current_user()
  {
    if (!$this->session->has_userdata(self::SESSION_KEY)) {
      return null;
    }

    $user_id = $this->session->userdata(self::SESSION_KEY);
    $query = $this->db->get_where($this->_table, ['id_guru' => $user_id]);
    return $query->row();
  }

  public function logout()
  {
    $this->session->unset_userdata(self::SESSION_KEY);
    return !$this->session->has_userdata(self::SESSION_KEY);
  }
}
