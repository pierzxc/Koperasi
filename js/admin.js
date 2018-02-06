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
            $("#connn").text(response[0].fullname);; 
            //alert(response);
        }

    });
}