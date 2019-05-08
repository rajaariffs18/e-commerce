function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}


$(document).on("change",".load_ajax_change",function(e){

  // alert("AAaa");
  var target= $(this).data('ajaxtarget');
  var data= $(this).data('ajaxdata');
  // var data_unit = $(this).data('ajaxunit');
  var load= $(this).data('ajaxload');
  var format= $(this).data('format');
  var data_arr = data.split('|');

  var keys = '';
  for (i = 0; i < data_arr.length; i++) {
    var key = $(data_arr[i]).val();
    keys += key+'|';
  }

  // alert("as");

  $(target).html("mengambil data ...");

  $.ajax({
    type: "POST",
    url:load,
    data:{keys:keys},
    success: function(isi){
      // alert(isi);
      if (format == 'val') {
          var kurir =  $("#kurir").val();
          $(target).val(isi);
          var pembelian = $('#pembelian').val();
          // alert(pembelian);
          // alert(isi);
          // $('.detail-ongkir').html(isi);    
          var res = isi.split("|"); 
          var total_belanja = Number(res[2])  + Number(pembelian);
          $('#harga_final').val(total_belanja);
          $('#estimasi_pengiriman').val(res[3]);
          $('#ongkos_kirim').val(res[2]);
          $('#total_pembayaran').val(total_belanja);
          $('#kab_kota').val(res[4]);
          $('#provinsi').val(res[5]);
          // $('.detail-ongkir').html(isi);    

          var text_metode_pembayaran = 'Pengiriman via '+kurir+' '+res[1]+', Shipment estimation '+res[3]+' hari Rp. '+formatNumber(res[2])+',00';
          

          $('#metode-pembayaran').html(text_metode_pembayaran);    
          $('#biaya-pengiriman').html('Rp. '+formatNumber(res[2]+',00'));   
          
          var texttotal = 'Rp. '+formatNumber(total_belanja)+',00';
          $('#total').html(texttotal);

        }
        else{
          $(target).html(isi);
        }
    },
    error: function(){
      console.log("Ambil data gagal");
      $(target).html("");
    }
  });

});


