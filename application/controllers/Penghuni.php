<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends CI_Controller {

	
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='penghuni/tampil_datapenghuni';
		$isi['judul']='master';
		$isi['sub_judul']='penghuni';
		$isi['data']=$this->db->get('penyewa');
		$this->load->view('tampilan_home',$isi);
	} 
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='penghuni/form_tambahpenghuni';
		$isi['judul']='master';
		$isi['sub_judul']='penghuni';

		$isi['nik']="";
		$isi['nama']="";
		$isi['pekerjaan']="";	
		$isi['penghasilan']="";
		
		$this->load->view('tampilan_home',$isi);
	}

	public function lihatlaporan()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='penghuni/v_lappenghuni';
		$isi['judul']='master';
		$isi['sub_judul']='penghuni';

		$isi['nik']="";
		$isi['nama']="";
		$isi['pekerjaan']="";	
		$isi['penghasilan']="";
		
		$this->load->view('tampilan_home',$isi);
	}

	/**
	 * fungsi untuk mengubah data tiap penghuni
	 * @param string nik
	 */
	public function edit($nik)
	{
		if(!empty($nik))
		{
			$this->model_security->getsecurity();
			$isi['content'] ='penghuni/form_tambahpenghuni';
			$isi['judul']='master';
			$isi['sub_judul']='edit penghuni';

		}
		else
		{
		}
		
		$this->db->where('nik',$key);
		$query=$this->db->get('penyewa');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				
				$isi['nik']=$row->nik;
				$isi['nama']=$row->nama;
				$isi['pekerjaan']=$row->pekerjaan;	
				$isi['penghasilan']=$row->penghasilan;
				
			}

		}
		else {
				
				$isi['nik']="";
				$isi['nama']="";
				$isi['pekerjaan']="";	
				$isi['penghasilan']="";
				
		}
		$this->load->view('tampilan_home',$isi);

	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key=$this->input->post('nik');
		$data['nik'] =$this->input->post('nik');
		$data['nama']=$this->input->post('nama');
		$data['pekerjaan']=$this->input->post('pekerjaan');
		$data['penghasilan']=$this->input->post('penghasilan');
		$transaksi['id_transaksi']=$this->input->post('no_perjanjian');
		$transaksi['id_kamar']=$this->input->post('id_kamar');
		$transaksi['nik']=$this->input->post('nik');
		$transaksi['tgl_awal']=$this->input->post('tgl_awal');
		$transaksi['tgl_akhir']=$this->input->post('tgl_akhir');
		
		$this->load->model('model_penyewa');
		$this->load->model('model_transaksi');
		$query=$this->model_penyewa->getdata($key);
		
		if($query->num_rows()>0)
		{
			$this->model_penyewa->getupdate($key,$data);
			$this->session->set_flashdata('info','data sukses diupdate !');
		}
		else{
			if($this->model_penyewa->getinsert($data) === TRUE)
			{
				if($this->model_transaksi->getinsert($transaksi))
				{
					$this->session->set_flashdata('info','data sukses ditambahkan !');
				}
			}
		}
		redirect('penghuni');
	}

	public function delete()
	{ 
	$this->model_security->getsecurity();
	$this->load->model('model_penyewa');

	$key=$this->uri->segment(3);
	$this->db->where('nik',$key);
	$query=$this->db->get('penyewa');

	if ($query->num_rows()>0)
	{
		$this->model_penyewa->getdelete($key);
	}
		redirect('penghuni');

	}


	function search($nik='')
	{
		$this->load->model('model_penyewa');
		if (!empty($nik)){
			$no = 1;
			$list_kamar=$this->model_penyewa->search($nik);
			echo "<tr>";
			foreach ($list_penyewa as $penyewa) {
				echo "
					<td>".$no." </td>
					<td> ".$penyewa->nik."</td>
					<td>".$penyewa->nama." </td>
					<td>".$penyewa->pekerjaan." </td>
					<td>".$penyewa->penghasilan." </td>
					
			<td> 
					<a href ='".base_url()."index.php/penghuni/edit/'".$penyewa->nik.">edit</a>
					<a href ='".base_url()."index.php/penghuni/delete/'".$penyewa->nik."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
		else
		{
			$no = 1;
			$list_kamar=$this->model_penyewa->browse_penyewa();
			echo "<tr>";
			foreach ($list_penyewa as $penyewa) {
				echo "
					<td>".$no." </td>
					<td> ".$penyewa->nik."</td>
					<td>".$penyewa->nama." </td>
					<td>".$penyewa->pekerjaan." </td>
					<td>".$penyewa->penghasilan." </td>
			<td> 
					<a href ='".base_url()."index.php/penghuni/edit/'".$kamar->nik.">edit</a>
					<a href ='".base_url()."index.php/penghuni/delete/'".$kamar->nik."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
	}
	

	public function render(){
		require FCPATH.'/vendor/mpdf/mpdf.php';
		$this->load->model('model_penyewa');
		$path = FCPATH.'/assets/temp/report.pdf';
		$isi['content'] ='kamar/tampil_datapenghuni';
		$isi['judul']='master';
		$isi['sub_judul']='Penghuni';
		$isi['data']=$this->db->get('penyewa');
		$source = $this->load->view('v_lappenghuni',$isi, TRUE);
		$pdf = new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'P');
		$pdf->WriteHTML($source);
		$pdf->Output($path, 'D');
	}

}

