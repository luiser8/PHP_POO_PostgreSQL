<?php include_once 'includes/header.inc'; ?>
<?php include_once 'includes/slideNav.php'; ?>

    <div class="container">
    	<div class="row">

    		<?php include_once 'includes/formulario.php'; ?>
			<button type="button" id="get" class="btn">Get</button>
    		<div class="col l12 m12 s12">
    			<div class="card blue-grey darken-1">
		            <div class="card-content white-text">
		              <span class="card-title">Datos</span>
		              	<p>Resultados</p> 
		            </div>         
		          </div> 
		          <div class="table" id="info">

		          </div>
    		</div>
    	</div>
    </div>
<script>
$(document).ready(function(){
    $('.modal').modal();
  });

//Slidenav
$(".button-collapse").sideNav();

//Ajax
	document.getElementById('get').addEventListener('click', traerInfo, false);
	document.getElementById('btn').addEventListener('click', function(){

		var cota = document.getElementById('cota').value;
		var titulo = document.getElementById('titulo').value;
		validDates(cota, titulo);
	});

	function validDates(cota, titulo){
		if(cota == ""){
			alert('Debes llenar cota');
		}else if(titulo == ""){
			alert('Debes llenar titulo');
		}else{
			setBook(cota, titulo);
		}
	}

	function setBook(cota, titulo){
		var datosForm = new FormData();

	    datosForm.append('cota', cota);
		datosForm.append('titulo', titulo);

		var url='api/Books/addBook.php';
		var solicitud=new XMLHttpRequest();

		if(window.XMLHttpRequest){
			solicitud = new XMLHttpRequest();
		}else{
			solicitud = new ActiveXObject("Microsoft.XMLHTTP");
		}
		solicitud.onreadystatechange=function(){
			if(solicitud.readyState == 4 && solicitud.status == 200){
	
			document.getElementById('cota').value = "";
			document.getElementById('titulo').value = "";

			}
		}
		solicitud.open('POST', url, true);
		solicitud.send(datosForm);
		traerInfo();
	}

function traerInfo(){
	var xmlhttp = new XMLHttpRequest();
	var data='api/Books/getBook.php';
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
           if (xmlhttp.status == 200) {
               document.getElementById("info").innerHTML = xmlhttp.responseText;
           }
           else if (xmlhttp.status == 400) {
              alert('error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    };
    xmlhttp.open("GET", data, true);
    xmlhttp.send();
}
</script>
</body>
</html>