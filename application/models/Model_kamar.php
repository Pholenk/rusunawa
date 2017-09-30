<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kamar extends CI_Model {


	public function getdata($key)
	{
		$this->db->where('id_kamar',$key);
		$hasil=$this->db->get('kamar');
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('id_kamar',$key);
		$this->db->update('kamar',$data);
	}
	public function getinsert($data)
	{
		$this->db->insert('kamar',$data,$key);
	}
	public function getdelete($key)
	{
		$this->db->where('id_kamar',$key);
		$this->db->delete('kamar');
	}
	public function browse_kamar()
	{
		$kamar=$this->db->get('kamar')->result();
		return $kamar;
	}

	function search($no_kamar){
		$this->db->select('id_kamar,no_kamar,lt,blok,tarif,type,status')->from('kamar')->like('no_kamar',$no_kamar);
		return $this->db->get()->result();
	}
}
