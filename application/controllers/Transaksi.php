<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_kamar');
	}

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='transaksi/form_transaksi';
		$isi['judul']='transaksi';
		$isi['sub_judul']='sewa';
		$isi['id_kamar']=$this->model_kamar->browse_kamar();
		$isi['id_transaksi']="";
		$isi['nik']="";	
		$isi['nama']="";
		$isi['pekerjaan']="";
		$isi['penghasilan']="";
		$isi['no_perjanjian']="";
		$isi['jangka_waktu']="";
		$isi['status_sewa']="";
		


		$isi['data']=$this->db->get('transaksi');
		$this->load->view('tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='transaksi/form_transaksi';
		$isi['judul']='transaksi';
		$isi['sub_judul']='sewa';

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
				$isi['id_kamar']=$row->id_kamar;
				$isi['nik']=$row->nik;	
				$isi['nama']=$row->nama;
				$isi['pekerjaan']=$row->pekerjaan;
				$isi['penghasilan']=$row->penghasilan;
				$isi['no_perjanjian']=$row->no_perjanjian;
				$isi['tgl_awal']=$row->tgl_awal;
				$isi['tgl_akhir']=$row->tgl_akhir;
				$isi['status_sewa']=$row->status_sewa;
				
			}

		}
		else {
				$isi['id_transaksi']="";
				$isi['id_kamar']="";
				$isi['nik']="";	
				$isi['nama']="";
				$isi['pekerjaan']="";
				$isi['penghasilan']="";
				$isi['no_perjanjian']="";
				$isi['tgl_awal']="";
				$isi['tgl_akhir']="";
				$isi['status_sewa']="";
				
		}

		//$isi['data']=$this->db->get('kamar');
		$this->load->view('tampilan_home',$isi);

	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key=$this->input->post('id_transaksi');
		$data['id_transaksi'] =$this->input->post('id_transaksi');
		$data['id_kamar']=$this->input->post('id_kamar');
		$data['nik']=$this->input->post('nik');
		$data['tgl_awal']=$this->input->post('tgl_awal');
		$data['tgl_akhir']=$this->input->post('tgl_akhir');
		$detail_transaksi['id_transaksi'] = $key;
		// $detail_transaksi['tgl_transaksi'] = '';

		$this->load->model('model_transaksi');
		$query=$this->model_transaksi->getdata($key);
		
		if($query->num_rows()>0)
		{
			$this->model_transaksi->getupdate($key,$data);
			$this->session->set_flashdata('info','data sukses diupdate !');
		}
		else{
			if($this->model_transaksi->getinsert($data))
			{
				if ($this->model_transaksi->simpan_det_transaksi($detail_transaksi) === TRUE) {
					$this->session->set_flashdata('info','data sukses ditambahkan !');
				} 
			}
		}
		redirect('kontrak');
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
		redirect('kontrak');

	}

function search($nik='')
	{
		$this->load->model('model_transaksi');
		if (!empty($id_transaksi)){
			$no = 1;
			$list_transaksi=$this->model_transaksi->search($id_transaksi);
			echo "<tr>";
			foreach ($list_transaksi as $transaksi) {
				echo "
					<td>".$no." </td>
					<td> ".$transaksi->id_transaksi."</td>
					<td>".$transaksi->id_kamar." </td>
					<td>".$transaksi->nik." </td>
					<td>".$transaksi->tgl_awal." </td>
					<td>".$transaksi->tgl_akhir." </td>
					
			<td> 
					<a href ='".base_url()."index.php/transaksi/edit/'".$transaksi->id_transaksi.">edit</a>
					<a href ='".base_url()."index.php/transaksi/delete/'".$transaksi->id_transaksi."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
		else
		{
			$no = 1;
			$list_transaksi=$this->model_transaksi->browse_transaksi();
			echo "<tr>";
			foreach ($list_transaksi as $transaksi) {
				echo "
					<td>".$no." </td>
					<td> ".$transaksi->id_transaksi."</td>
					<td>".$transaksi->id_kamar." </td>
					<td>".$transaksi->nik." </td>
					<td>".$transaksi->tgl_awal." </td>
			<td> 
					<a href ='".base_url()."index.php/transaksi/edit/'".$transaksi->id_transaksi.">edit</a>
					<a href ='".base_url()."index.php/transaksi/delete/'".$transaksi->id_transaksi."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
	}
	

	public function render(){
		require FCPATH.'/vendor/mpdf/mpdf.php';
		$this->load->model('model_transaksi');
		$path = FCPATH.'/assets/temp/report.pdf';
		$isi['content'] ='transaksi/tampil_kontrak';
		$isi['judul']='master';
		$isi['sub_judul']='Transaksi';
		$isi['data']=$this->db->get('transaksi');
		$source = $this->load->view('v_lapkontrak',$isi, TRUE);
		$pdf = new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'P');
		$pdf->WriteHTML($source);
		$pdf->Output($path, 'D');
}



}
