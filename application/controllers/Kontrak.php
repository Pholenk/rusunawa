<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {

	
	public function index()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_transaksi');
		$isi['content'] ='transaksi/tampil_kontrak';
		$isi['judul']='Transaksi';
		$isi['sub_judul']='Lihat Kontrak';
		$isi['data']= $this->model_transaksi->browse_transaksi();
		foreach ($this->model_transaksi->browse_transaksi() as $trans) {
			$isi['tgl'][''.$trans->id_transaksi] = $this->model_transaksi->getLastTransaksi($trans->id_transaksi);
		}

		$this->load->view('tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='transaksi/form_transaksi';
		$isi['judul']='transaksi';
		$isi['sub_judul']='sewa';
		$isi['id_transaksi']="";
		$isi['id_penyewa']="";
		$isi['id_kamar']="";	
		$isi['nama']="";
		$isi['no_perjanjian']="";
		$isi['jangka_waktu']="";

		$isi['data']=$this->db->get('transaksi');
		
		$this->load->view('tampilan_home',$isi);
	}

	
	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='transaksi/form_transaksi';
		$isi['judul']='transaksi';
		$isi['sub_judul']='tambah transaksi';
		$key=$this->uri->segment(3);
		$this->db->where('id_transaksi',$key);
		$query=$this->db->get('transaksi');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['id_transaksi']=$row->id_transaksi;
				$isi['id_penyewa']=$row->id_penyewa;
				$isi['id_kamar']=$row->id_kamar;	
				$isi['nama']=$row->nama;
				$isi['no_perjanjian']=$row->no_perjanjian;
				$isi['jangka_waktu']=$row->jangka_waktu;
				
			}

		}
		else {
				$isi['id_transaksi']="";
				$isi['id_penyewa']="";
				$isi['id_kamar']="";	
				$isi['nama']="";
				$isi['no_perjanjian']="";
				$isi['jangka_waktu']="";
				
		}

		//$isi['data']=$this->db->get('kamar');
		$this->load->view('tampilan_home',$isi);

	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key=$this->input->post('id_transaksi');
		$data['id_transaksi'] =$this->input->post('id_transaksi');
		$data['id_penyewa']=$this->input->post('id_penyewa');
		$data['id_kamar']=$this->input->post('id_kamar');
		$data['nama']=$this->input->post('nama');
		$data['no_perjanjian']=$this->input->post('no_perjanjian');
		$data['jangka_waktu']=$this->input->post('jangka_waktu');
		
		$this->load->model('model_transaksi');
		$query=$this->model_transaksi->getdata($key);
		
		if($query->num_rows()>0)
		{
			$this->model_transaksi->getupdate($key,$data);
			$this->session->set_flashdata('info','data sukses diupdate !');
			
		}
		else{
			$this->model_transaksi->getinsert($data);
			$this->session->set_flashdata('info','data sukses ditambahkan !');
			
		}
		redirect('tampil_kontrak');
	}
	
	public function delete()
	{
	$this->model_security->getsecurity();
	$this->load->model('model_transaksi');

	$key=$this->uri->segment(3);
	$this->db->where('id_transaksi',$key);
	$query=$this->db->get('transaksi');

	if ($query->num_rows()>0)
	{
		$this->model_transaksi->getdelete($key);
	}
		redirect('tampil_kontrak');

	}

}