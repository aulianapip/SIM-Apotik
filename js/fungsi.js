// JavaScript Document
$(document).ready(function(){
		//mengaktifkan tooltip	
		$('[data-toggle="tooltip"]').tooltip();
		
	
		
		
	//****** TRANSAKSI PENJUALAN *********//
	
	//input kode barang
	$('#inpKodeBarang').keypress(function(e) {
		if(e.which == 13) {
			var kdBarang = $(this).val()
			var noFaktur = $('#inpNoFaktur').val();
			if(kdBarang.length>=1){
				
				$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{cariBarang:'',kdBarang:kdBarang,noFaktur:noFaktur},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 10);
						$('#inpKodeBarang').focus();
					},
					//error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
					error: function (xhttp, status, res){console.log("xhttp:" + xhttp + "|" + "status:" + status + "|" + "res:" + res);},
				});	
				//alert(noFaktur);	
			}
			
		}
	});
		
	//hapus item penjualan.
	$(".btnHapusJual").click(function(){
		var r = confirm('YAKIN INGIN MENGHAPUS DATA INI ???');
		if(r==true){
				var id = $(this).data('val');
				$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{hapusJual:'',kodeRow:id},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 0);
					},
					
				});
		};	
		
		
	});
	
	//simpan data penjualan
	$("#btnJualSimpan").click(function(){
		var noFaktur = $('#inpNoFaktur').val();
			$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{simpanJual:'',noFaktur:noFaktur},
					dataType: "json",
					success:function(resp){
						$("#alertMsg").html(resp.msg1);
						window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
		//alert(noFaktur);
	});
	//laporan setoran kasir. 
	$("#btnKasirSetoran").click(function(){
		$("#formKasirSetoran").submit(function(e){return false;});
		
		var tglAwal = $('#tglAwal').val();
		var blnAwal = $('#blnAwal').val();
		var thnAwal = $('#thnAwal').val();
		var tglAkhir = $('#tglAkhir').val();
		var blnAkhir = $('#blnAkhir').val();
		var thnAkhir = $('#thnAkhir').val();
		var user = $('#user').val();
		
		$.ajax({
					type:"POST",
					url:"kasir/penjualan_proses.php",
					data:{setoranKasir:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir,user:user},
					dataType: "json",
					success:function(resp){
						$("#tblPlaceHolder").html(resp.msg1);
						//window.setTimeout(function(){window.location=window.location;}, 0);
					},
					error: function() {$('#alertMsg').html('<h3>Ajax Bermasalah !!!</h3>')},
			});
	
		//alert(thnAkhir);
	});	
	
	
	
	
});	


	