/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 

function onSelectedNoBa()
{
	var conceptName = $('#soflow').find(":selected").text();
	$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "api/getUserByNoBa.php?no_ba="+conceptName,	
        dataType: "json",   //expect html to be returned                
        success: function(response){                    
            $("#nama").text(response[0].fullname); 
			$("#alamat").text(response[0].alamat);
            //alert(response);
        }

    });
}

function onSelectedNoBaSimpanan()
{
	var conceptName = $('#soflow').find(":selected").text();
	$.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "api/getSimpananByNoBa.php?no_ba="+conceptName,	
        dataType: "json",   //expect html to be returned                
        success: function(response){
			var tableheader = "<tr class='w3-blue'><td>Nomor Transaksi</td><td>Tanggal Transaksi</td><td>Simpanan Sukarela</td><td>Simpanan Wajib</td><td>Penarikan</td></tr>";
            $("#simpanancontainer").html(tableheader);
			for (i = 0; i < response.length; i++) {
				console.log(response[i].nomor_transaksi);
				var simpanan_sukarela = (response[i].simpanan_sukarela).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				var simpanan_wajib = (response[i].simpanan_wajib).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				var penarikan = (response[i].penarikan).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				var tablecontent = "<tr><td>"+response[i].nomor_transaksi+"</td><td>"+response[i].tanggal_transaksi+"</td><td>Rp. "+simpanan_sukarela+"</td><td>Rp. "+simpanan_wajib+"</td><td>Rp. "+penarikan+"</td></tr>";
				$("#simpanancontainer").append(tablecontent);
			} 
            //alert(response);
        }

    });
}