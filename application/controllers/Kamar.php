<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='kamar/tampil_kamar';
		$isi['judul']='master';
		$isi['sub_judul']='kamar';
		$isi['id_kamar']="";
		$isi['no_kamar']="";
		$isi['lt']="";	
		$isi['blok']="";
		$isi['tarif']="";
		$isi['type']="";
		$isi['status']="";
		$isi['data']=$this->db->get('kamar');
		$this->load->view('tampilan_home',$isi);
	}
	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='kamar/form_tambahkamar';
		$isi['judul']='master';
		$isi['sub_judul']='kamar';
		

		//$isi['data']=$this->db->get('kamar');
		$this->load->view('tampilan_home',$isi);
	}

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content'] ='kamar/form_tambahkamar';
		$isi['judul']='master';
		$isi['sub_judul']='edit kamar';
		$key=$this->uri->segment(3);
		$this->db->where('id_kamar',$key);
		$query=$this->db->get('kamar');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$isi['id_kamar']=$row->id_kamar;
				$isi['no_kamar']=$row->no_kamar;
				$isi['lt']=$row->lt;	
				$isi['blok']=$row->blok;
				$isi['tarif']=$row->tarif;
				$isi['type']=$row->type;
				$isi['status']=$row->status;
			}

		}
		else {
				$isi['id_kamar']="";
				$isi['no_kamar']="";
				$isi['lt']="";	
				$isi['blok']="";
				$isi['tarif']="";
				$isi['type']="";
				$isi['status']="";


		}

		//$isi['data']=$this->db->get('kamar');
		$this->load->view('tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key=$this->input->post('id_kamar');
		$data['id_kamar'] =$this->input->post('id_kamar');
		$data['no_kamar']=$this->input->post('no_kamar');
		$data['lt']=$this->input->post('lt');
		$data['blok']=$this->input->post('blok');
		$data['tarif']=$this->input->post('tarif');
		$data['type']=$this->input->post('type');
		$data['status']=$this->input->post('status');
		
		
		$this->load->model('model_kamar');
		$query=$this->model_kamar->getdata($key);
		//$hasil=count($query);
		if($query->num_rows()>0)
		{
			$this->model_kamar->getupdate($key,$data);
			$this->session->set_flashdata('info','data sukses diupdate !');
			//return $query->result();

		}
		else{
			$this->model_kamar->getinsert($data);
			$this->session->set_flashdata('info','data sukses ditambahkan !');
			//return $query->result();
		}
		redirect('kamar');
	}

	public function delete()
	{
	$this->model_security->getsecurity();
	$this->load->model('model_kamar');

	$key=$this->uri->segment(3);
	$this->db->where('id_kamar',$key);
	$query=$this->db->get('kamar');

	if ($query->num_rows()>0)
	{
		$this->model_kamar->getdelete($key);
	}
		redirect('kamar');

	}

	function search($no_kamar='')
	{
		$this->load->model('model_kamar');
		if (!empty($no_kamar)){
			$no = 1;
			$list_kamar=$this->model_kamar->search($no_kamar);
			echo "<tr>";
			foreach ($list_kamar as $kamar) {
				echo "
					<td>".$no." </td>
					<td> ".$kamar->id_kamar."</td>
					<td>".$kamar->no_kamar." </td>
					<td>".$kamar->lt." </td>
					<td>".$kamar->blok." </td>
					<td>".$kamar->tarif." </td>
					<td>".$kamar->type." </td>
					<td>".$kamar->status." </td>
			<td> 
					<a href ='".base_url()."index.php/kamar/edit/'".$kamar->id_kamar.">edit</a>
					<a href ='".base_url()."index.php/kamar/delete/'".$kamar->id_kamar."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
		else
		{
			$no = 1;
			$list_kamar=$this->model_kamar->browse_kamar();
			echo "<tr>";
			foreach ($list_kamar as $kamar) {
				echo "
					<td>".$no." </td>
					<td> ".$kamar->id_kamar."</td>
					<td>".$kamar->no_kamar." </td>
					<td>".$kamar->lt." </td>
					<td>".$kamar->blok." </td>
					<td>".$kamar->tarif." </td>
					<td>".$kamar->type." </td>
					<td>".$kamar->status." </td>
			<td> 
					<a href ='".base_url()."index.php/kamar/edit/'".$kamar->id_kamar.">edit</a>
					<a href ='".base_url()."index.php/kamar/delete/'".$kamar->id_kamar."' onclick='return confirm ('Anda yakin ingin menghapus data ini ?');'>delete</a>

			</td>
				";
				$no++;
			}
			echo "<tr>";
		}
	}
	
	public function render()
	{
		require FCPATH.'/vendor/mpdf/mpdf.php';
		$this->load->model('model_kamar');
		$path = FCPATH.'/assets/temp/report.pdf';
		$isi['content'] ='kamar/tampil_kamar';
		$isi['judul']='master';
		$isi['sub_judul']='kamar';
		$isi['data']=$this->db->get('kamar');
		$source = $this->load->view('tampilan_home',$isi, TRUE);
		$pdf = new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'P');
		$pdf->WriteHTML($source);
		$pdf->Output($path, 'D');
	}
} 