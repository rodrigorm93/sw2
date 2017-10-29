@extends('layouts.secundaria')
@section('contenido')

	<!-- CSS para slideshow de imagenes -->
	<link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">

	<!-- pull-right:posiciona el elemento a la derecha de la pantalla -->
	@foreach ($servicios as $servicio)
	
		<hr>
		<div class="row" >
			<div class="4u" style="vertical-align: middle;" >
				<section>
					<a href="#" class=""><img src="images/pic03.jpg" alt="" height="200" width="200" ></a>
				</section>
			</div>
			<div class="8u">
				<section>
					<a href="#" style="text-decoration:none" ><h3 style="color:#00BFFF;">{{$servicio -> titulo}}</h3></a>
				</section>
			</div>
			<div class="4u">
				<section>
					<div style="border-bottom: 1px solid silver;"></div>
					Autor: {{$servicio -> nombre}} Mendez <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Servicio: Mudanza <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Vehículo: Camión <br>
					<div style="border-bottom: 1px solid silver;"></div>
					Lugar: Talca <br>
					<div style="border-bottom: 1px solid silver;"></div>
				</section>
			</div>
			<div class="4u">
				<section>
					${{$servicio -> precio_serv}} <br>
					Valoración: ★★★★★ <br>
					<a href="#" class="button ">Añadir a favoritos</a>
				</section>
			</div>
		</div>
	
	@endforeach
	{{$servicios->render()}}




<br>
	<h2 class="w3-center">Manual Slideshow</h2>

	<div class="w3-content w3-display-container">
	  <img class="mySlides" src="uploads/7JNaYs6oZhXRhs6BfyqcvRYeDQlKLc-banner.jpg" style="width:100%; height: 520px">
	  <img class="mySlides" src="http://cdn01.ib.infobae.com/adjuntos/162/imagenes/014/014/0014014674.jpg" style="width:100%; height: 520px">

	  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
	  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
	</div>

	<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}

	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
	     x[i].style.display = "none";  
	  }
	  x[slideIndex-1].style.display = "block";  
	}
	</script>


@stop