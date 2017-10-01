<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends CI_Controller {

	
	public function index()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_penyewa');
		$isi['content'] ='penghuni/tampil_datapenghuni';
		$isi['judul']='master';
		$isi['sub_judul']='penghuni';
		$isi['data']=$this->model_penyewa->browse_penyewa();
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
		$isi['id_transaksi'] = "";
		$isi['id_kamar'] = "";
		$isi['tgl_awal'] = Null;
		$isi['tgl_akhir'] = Null;
		
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
			$this->load->model('model_penyewa');
			$isi['content'] ='penghuni/form_tambahpenghuni';
			$isi['judul']='master';
			$isi['sub_judul']='edit penghuni';

			$result = $this->model_penyewa->getdata($nik);
			foreach ($result as $row)
			{
				$isi['nik']=$row->nik;
				$isi['nama']=$row->nama;
				$isi['pekerjaan']=$row->pekerjaan;	
				$isi['penghasilan']=$row->penghasilan;
				$isi['id_transaksi'] = $row->id_transaksi;
				$isi['id_kamar'] = $row->id_kamar;
				$isi['tgl_awal'] = $row->tgl_awal;
				$isi['tgl_akhir'] = $row->tgl_akhir;
			}

			$this->load->view('tampilan_home',$isi);
		}
		else
		{
			redirect('penghuni');
		}
	}

	public function simpan($nik = '')
	{
		// load model yang dibutuhkan
		$this->model_security->getsecurity();
		$this->load->model('model_penyewa');
		$this->load->model('model_transaksi');

		// inisialisasi variabel kunci penghuni/penyewa
		if (empty($nik))
		{
			// jika url yang diakses localhost/rusunawa/simpan/
			// maka variabel kunci diberi nilai sesuai inputan nik
			$keyPenyewa = $this->input->post('nik');
		}
		else
		{
			// jika url yang diakses localhost/rusunawa/edit/xxxxx
			// maka variabel kunci diberi nilai sesuai xxxxx
			$keyPenyewa = $nik;
		}

		// inisialisasi variabel kunci transaksi diambil dari inputan id_transaksi
		$keyTransaksi = $this->input->post('id_transaksi');

		// inisialisasi data penyewa / penghuni
		$data['nik'] =$keyPenyewa;
		$data['nama'] = $this->input->post('nama');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$data['penghasilan'] = $this->input->post('penghasilan');

		// inisialisasi data transaksi
		$transaksi['id_transaksi'] = $keyTransaksi;
		$transaksi['id_kamar'] = $this->input->post('id_kamar');
		$transaksi['nik'] = $keyPenyewa;
		$transaksi['tgl_awal'] = $this->input->post('tgl_awal');
		$transaksi['tgl_akhir'] = $this->input->post('tgl_akhir');
		
		// pengecekan data penyewa
		if($this->model_penyewa->dataExist($keyPenyewa) > 0)
		{
			$this->model_penyewa->getupdate($keyPenyewa,$data);

			// pengecekan data transaksi
			if($this->model_transaksi->dataExist($keyTransaksi) > 0)
			{
				$this->model_transaksi->getupdate($keyTransaksi,$transaksi);
			}
			else
			{
				$this->model_transaksi->getinsert($transaksi);
			}
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

	public function delete($nik)
	{
		$this->model_security->getsecurity();
		$this->load->model('model_penyewa');
		$this->load->model('model_transaksi');

		if ($this->model_penyewa->dataExist($nik) > 0)
		{
			$this->model_transaksi->getdelete($nik);
			$this->model_penyewa->getdelete($nik);
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

