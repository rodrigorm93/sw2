@extends('layouts.inicial')
@section('contenido')

	<section id="two" class="wrapper style1">
		<header class="major">
			<h2>Nuevo usuario</h2>
			<p>Unete y disfruta los privilegios de ser parte de esta familia</p>
		</header>
		<div class="container" align="center">
			<form style="width: 60%; text-align: left ">
			  	Correo electrónico:<br>
			  	<input type="text" name="email"><br>
			  	Nombre:<br>
			  	<input type="text" name="nombre">
			  	Apellido<br>
			  	<input type="text" name="apellido"><br>
			  	Contraseña<br>
			  	<input type="text" name="pass">
			  	Repita la contraseña<br>
			  	<input type="text" name="pass2">
			</form>

			
			<div class="row" >
				<div class="6u" align="right"> <a href="/" class="button special"  >Cancelar</a> </div>
				<div class="6u" align="left"> <a href="#" class="button special"  >Aceptar</a> </div>
			</div>
			

		</div>
	</section>

@stop