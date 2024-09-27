/*------------------------------------------------------------------------Rates---------------------------------------------------------------*/

var slideIndex = 0;


function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
/*Search */
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


/*---------------------------------------------------------------------------Registration Form--------------------------------------------------------------------------*/

var loadFile = function(event)
{
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
}

function checkPassword(){
	if(document.getElementById("pwd").value != document.getElementById("rpwd").value)
	{
		alert("Passwords are mismatched!!");
		return false;
	}
	else{
		alert("Passwords matched!!");
		return true;
	}
}


function enableButton(){
	if(document.getElementById("policy").checked){
		document.getElementById("btn1").disabled=false;
	}
	else{
		document.getElementById("btn1").disabled=true;
	}


}


