<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;

//Modelos
use App\Imagenes;
use App\Persona;
use App\Anuncio;
use App\Vehiculo;
use App\Orden;
use App\Forma_pago;
use App\Secretaria;

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class ServiciosController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;
//comentario

    }

    public function index(){
        
        $servicios = DB::table('anuncio as a')
        ->join ('orden as o', 'a.id_anuncio', '=' , 'o.id_anuncio')
        ->join ('users as u', 'o.id_cliente', '=' , 'u.id')
        ->join ('fotos as f', 'a.id_anuncio', '=' , 'f.id_anuncio')
        ->where('f.id_foto', '=', '0')
        ->select('a.id_anuncio as id_anuncio',
                'a.titulo as titulo',
                'a.descripcion as descripcion',
                'a.precio_serv as precio_serv',
                'a.tipo_servicio as tipo_servicio',
                'a.region as region',
                'a.comuna as comuna',
                'u.nombre as nombre',
                'u.apellido as apellido',
                'f.foto as foto'
                )
        ->paginate(5);

        return view('servicios.index', ["servicios" => $servicios]);

        //return view('servicios.pdf');
    }

    public function create(){

         $regiones=DB::table('region')->get();

         $provincias = DB::table('provincia')->get();

         $comunas = DB::table('comuna')->get();

        return view('servicios.create',['regiones'=> $regiones,'provincias'=> $provincias, 'comunas'=> $comunas]);
    }

    public function store(Request $request){ 

    $tipoServicio=$request->get('tipo'); //captura el tipo de servicio

      $tituloAnuncio=$request->get('titulo'); //captura el titulo del anuncio
      $duracion=$request->get('tiempo2'); //captura el titulo del anuncio


      $totalPagar=$request->get('total2');
      $tipoPago=$request->get('modo_pago'); //captura el tipo de pago

      try {

            DB::beginTransaction();

            //Guarda los datos del anuncio
            $anuncio = new Anuncio;
            $lastValue = DB::table('anuncio')->orderBy('id_anuncio', 'desc')->first();
            if(count($lastValue) < 1){
              $anuncio->id_anuncio = 1;   
            }else{
              $anuncio->id_anuncio = $lastValue->id_anuncio + 1 ;
            }
            $anuncio->titulo = $request->get('titulo');
            $anuncio->descripcion = $request->get('descripcion');
            $anuncio->condicion = 0;
            $anuncio->precio_serv = $request->get('precio_serv');
            $anuncio->region = $request->get('region');
            $anuncio->comuna = $request->get('comuna');
            $anuncio->tipo_servicio = $request->get('tipo');

            //Ingresa los datos de la persona o el vehiculo
            if($tipoServicio == 'mecanico' || $tipoServicio == 'otros_per'){

                $persona = new Persona;
                $persona->rut= Input::get('rut');
                $persona->nombre          = Input::get('nombre');
                $persona->apellido          = Input::get('apellido');
                $persona->profesion            = Input::get('profesion');
                $persona->años_experiencia  = Input::get('years');
                $persona->curriculum         = Input::get('curriculum');
                $persona->save();

                $anuncio->rut = $request->get('rut');
                $anuncio->patente = null;
            }
            else{

                $vehiculo = new Vehiculo;
                $vehiculo->patente= Input::get('patente');
                $vehiculo->categoria  = Input::get('categoria');
                $vehiculo->capacidad  = Input::get('capacidad');
                $vehiculo->save();

                $anuncio->rut = null;
                $anuncio->patente = $request->get('patente');
            }

            $anuncio->save();  


            //AGREGAR DATOS A TABLA FORMA_PAGO
            $pago = new Forma_pago;
            $lastValue = DB::table('forma_pago')->orderBy('num_pago', 'desc')->first();
            if(count($lastValue) < 1){
              $pago->num_pago = 1;   
            }else{
              $pago->num_pago = $lastValue->num_pago + 1 ;
            }
            $pago->modo = Input::get('modo_pago');
            $pago->fecha_pago = '';
            $pago->anexo = '';
            $pago->save();  


            
            //Genera los datos de la orden
            $orden = new Orden;
            $orden->num_pago = $pago->num_pago; 
            $orden->id_anuncio = $anuncio->id_anuncio;
            $orden->id_cliente = $this->auth->user()->id;
            $orden->fecha = date("Y-m-d");
            $orden->precio_uni  = 5290;
            $orden->duracion = Input::get('tiempo');
            $lastValue = DB::table('secretaria')->orderBy('anuncios_pend', 'asc')->first();
            $orden->id_secretaria = $lastValue->id_secretaria;
            $orden->save();  

            //Actualiza los anuncios pendientes de una secretaria
            $id_secretaria = $orden->id_secretaria;
            Secretaria::where('id_secretaria', $id_secretaria)
              ->update(['anuncios_pend' => $lastValue->anuncios_pend+1]);


            //AQUI SE GUARDAN LAS FOTOS
            //Se crean los array de los siguientes datos:
            $file = Input::file('imagen');

            $cont = 0;

            //Se recorren y asignan los array
            while($cont < count($file)){

                //se le asigna un nombre aleatorio a la imagen
                /*$random = str_random(30);
                $nombre = $random.'-'.$file[$cont]->getClientOriginalName();
                $path = public_path( 'uploads/'.$nombre );
                $url = '/uploads/'.$nombre;
                $image = Image::make( $file[$cont] -> getRealPath() );
                //cambia el tamano de la imagen
                $image->resize(640, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                //guarda la imagen en el directorio public/uploads
                $image->save($path);*/

               // $image = Image::make( $file[$cont] -> getRealPath() );
                //$image = (string) Image::make( $file[$cont] -> getRealPath() )->encode('data-url');
                $temp = file_get_contents($file[$cont] );
                $image = base64_encode($temp);


                $imagen = new Imagenes;
                $imagen->id_foto = $cont;
                $imagen->id_anuncio = $anuncio->id_anuncio;
                $imagen->foto = $image;
                $imagen->save();   

                $cont = $cont+1;
            }


            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
        }


        if($tipoPago=='efectivo'){
            //GENERA UN PDF PARA LOS VEHICULOS
              $numero_aleatorio = rand(10456780,16456780); //generamos el numero del comprobante
               $fechaActual = date('d-m-Y'); //obtenemos la fecha
               //Incrementando 20 dias
              $mod_date = strtotime($fechaActual."+ 20 days");
              $fechaVencimiento=date("d-m-Y",$mod_date);

          

                $anuncio=DB::table('anuncio as a')
                ->where('a.titulo','=',$tituloAnuncio)     
                 ->get();



               $pdf = PDF::loadView('servicios.pdf', ["anuncio" => $anuncio,"total" => $totalPagar,"comprobante" => $numero_aleatorio,"fecha" => $fechaActual,"fechaV" => $fechaVencimiento,"duracion" => $duracion]);
               return $pdf->download('factura.pdf');
        }

        return Redirect::to('/');

    }

    public function show($id_anuncio)
    {
        $servicio = DB::table('anuncio')->where('id_anuncio', $id_anuncio)->first();
        $imagenes = DB::table('fotos')->where('id_anuncio', $id_anuncio)->get();

        return view("servicios.ver_anuncio", ['servicio' => $servicio, 'imagenes' => $imagenes]);
    }

  }