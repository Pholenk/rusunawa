<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
<div>
  <p style="text-align: center;"> LAPORAN DATA SEWA </p>
</div>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="short">ID TRANSAKSI</th>
	  			<th class="normal">NIK</th>
	  			<th class="normal">ID KAMAR</th>
	  			<th class="normal">NAMA</th>
          <th class="normal">PEKERJAAN</th>
          <th class="normal">PENGHASILAN</th>
          <th class="normal">TARIF</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		<?php foreach($data->result() as $row): ?>
	  		  <tr>
	  			<td><?php echo $no; ?></td>
	  			<td><?php echo $row->nik; ?></td>
	  			<td><?php echo $row->nama; ?></td>
	  			<td><?php echo $row->pekerjaan; ?></td>
          <td><?php echo $row->penghasilan; ?></td>
          <td><?php echo $row->tarif; ?></td>
	  		  </tr>
	  		<?php $no++; ?>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
</body>

<p style="text-align: center;"> 
<a href="<?php echo base_url();?>index.php/penghuni/render"> CETAK LAPORAN </a>

</p>
</html>