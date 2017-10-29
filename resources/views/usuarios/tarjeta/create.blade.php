@extends('layouts.inicial')
@section('contenido')

    <!-- CAMBIAR POR LOS DATOS PARA CREAR UN ANUNCIO -->
    <section id="two" class="wrapper style1">
        <header class="major">
            <h2>Vincular tarjeta de crédito</h2>
        </header>
        <div class="container" align="center">
            {!!Form::open(array('url'=>'usuarios.tarjeta.store', 'method'=>'POST', 'style'=>'width: 60%; text-align: left', 'autocomplete'=>'off'))!!}
                
                <input id="id_cliente" type="hidden" class="form-control" name="id_cliente" value={{Auth::user()->id}}  >

                <div>
                    Número de tarjeta:<br>
                    <div class="col-md-6">
                        <div class="7u"><input id="num_tarjeta" type="text" class="form-control" onchange="detecta_tarjeta()" name="num_tarjeta" value="" required autofocus></div>
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    Tipo de tarjeta:<br>
                    <div class="col-md-6">
                        <div class="5u"><input id="tarjeta" type="text" class="form-control" name="tarjeta" value="" autofocus readonly></div>
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                    <div class="row" >
                        <div class="3u" align="left">Fecha de caducidad:</div>
                        <div class="row" >
                            <div class="3u"><input id="mes" type="text" class="form-control" name="mes" value="" required placeholder="MM"></div>
                            <div class="3u"><input id="year" type="text" class="form-control" name="year" value="" required placeholder="YY"></div>
                            <div class="3u"><input id="c_seguridad" type="text" class="form-control" name="c_seguridad" value="" required placeholder="CVV"></div>
                        </div>
                    </div>
                </div><br>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    Nombre del titular:<br>
                    <div class="row" >
                        <div class="5u"><input id="nombre" type="text" class="form-control" name="nombre" value="" required placeholder="Nombre"></div>
                        <div class="5u"><input id="apellidos" type="text" class="form-control" name="apellidos" value="" required placeholder="Apellidos"></div>
                    </div>
                </div><br><br>

                <div class="form-group">
                    <div class="row" >
                        <div class="6u" align="right"> <a href="/" class="button special"  >Cancelar</a> </div>
                        <div id="aceptar" class="6u" align="left"> <button type="submit" class="button special">
                            Guardar</button> 
                        </div>
                    </div>
                </div>

            {!!Form::close()!!}
        </div>
    </section>


    <script type="text/javascript">

        function detecta_tarjeta(){
            var n_tarjeta = document.getElementById("num_tarjeta");
            var tarjeta = document.getElementById("tarjeta");
            if(n_tarjeta.value[0] == 4)
                tarjeta.value = "VISA";
            else if(n_tarjeta.value[0] == 5)
                tarjeta.value = "MASTERCARD";
            else
                tarjeta.value = "TARJETA NO VÁLIDA";
        }
    </script>

@stop