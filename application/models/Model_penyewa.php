<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penyewa extends CI_Model {


	public function getdata($key)
	{
		$this->db->select('penyewa.*,transaksi.*')->from('penyewa');
		$this->db->join('transaksi', 'transaksi.nik = penyewa.nik');
		$this->db->where('penyewa.nik',$key);
		$hasil=$this->db->get()->result();
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('nik',$key);
		$this->db->update('penyewa',$data);
	}
	public function getinsert($data)
	{
		$status = FALSE;
		if($this->db->insert('penyewa',$data))
		{
			$status = TRUE;
		}
		return $status;
	} 
	public function getdelete($key)
	{
		$this->db->where('nik',$key);
		$this->db->delete('penyewa');

	}   
	public function browse_penyewa()
	{
		$penyewa=$this->db->get('penyewa')->result();
		return $penyewa;
	}

	function search($nik){
		$this->db->select('nik,nama,pekerjaan,penghasilan')->from('penyewa')->like('nik',$nik);
		return $this->db->get()->result();
	}

	/**
	 * fungsi ini digunakan untuk validasi
	 */
	public function dataExist($nik)
	{
		return $this->db->get_where('penyewa', array('nik'=>$nik))->num_rows();
	}
}
