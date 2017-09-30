
/* LAPRAN KAMAR*/
$(document).ready(function(){
	$('body').on('keyup', '#kamar_search', function(){
		$.ajax({
			type:'post',
			url:'kamar/search/'+ $('#kamar_search').val(),
			success:function(response){
				$('#list_kamar').html(response)
			}
		})
	})
})

/* LAPRAN PENYEWA*/
$(document).ready(function(){
	$('body').on('keyup', '#penyewa_search', function(){
		$.ajax({
			type:'post',
			url:'penghuni/search/'+ $('#penyewa_search').val(),
			success:function(response){
				$('#list_penyewa').html(response)
			}
		})
	})
})

/* LAPRAN SEWA*/
$(document).ready(function(){
	$('body').on('keyup', '#transaksi_search', function(){
		$.ajax({
			type:'post',
			url:'transaksi/search/'+ $('#transaksi_search').val(),
			success:function(response){
				$('#list_transaksi').html(response)
			}
		})
	})
})