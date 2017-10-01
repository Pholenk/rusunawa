<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function getdata($key)
	{
		$this->db->where('id_transaksi',$key);
		$hasil=$this->db->get('transaksi');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_transaksi',$key);
		$this->db->update('transaksi',$data);
	}

	public function getinsert($data)
	{
		$status = FALSE;
		if($this->db->insert('transaksi',$data))
		{
			$status = TRUE;
		}
		return $status;
	}

	public function getdelete($key)
	{
		$this->delete_det_transaksi($key);
		$this->db->where('nik',$key);
		$this->db->delete('transaksi');
	}

	/**
	 * fungsi simpan data detail transaksi
	 * @param mixed data transaksi
	 * @return bool
	 */
	public function simpan_det_transaksi($data)
	{
		$status = FALSE;
		if($this->db->insert('detail_transaksi', $data))
		{
			$status = TRUE;
		}
		return $status;
	}

	/**
	 * fungsi hapus detail transaksi 
	 * @param string nik
	 * @return bool
	 */
	public function delete_det_transaksi($nik)
	{
		return $this->db->query("delete from detail_transaksi where id_transaksi = (select id_transaksi from transaksi where nik = '".$nik."')");
	}

	public function browse_transaksi()
	{
		$transaksi=$this->db->get('transaksi')->result();
		return $transaksi;
	}

	function search($id_transaksi){
		$this->db->select('id_transaksi,id_kamar,nik,tgl_awal, tgl_akhir')->from('transaksi')->like('id_transaksi',$id_transaksi);
		return $this->db->get()->result();
	}

	public function dataExist($id_transaksi)
	{
		return $this->db->get_where('transaksi', array('id_transaksi'=>$id_transaksi))->num_rows();
	}
}
