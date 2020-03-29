<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Shopping_cart_model extends CI_Model
{

    public function main_menu()
    {
        return $this->db->select('m.*,a.akses,a.tambah,a.edit,a.hapus')->from('menu m')->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
            ->where(['m.level' => 'main_menu', 'a.akses' => '1'])->get()->result_array();
    }
    public function sub_menu()
    {
        return $this->db->select('m.*,a.akses,a.tambah,a.edit,a.hapus')->from('menu m')->join('akses a', 'a.kode_menu = m.kode_menu', 'left')
            ->where(['m.level' => 'sub_menu', 'a.akses' => '1'])->get()->result_array();
    }

    function fetch_all()
    {
        $query = $this->db->get("product");
        return $query->result();
    }
}
