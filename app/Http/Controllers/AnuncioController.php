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

use Image; 
use DB;
use PDF;
use Illuminate\Support\Facades\Input;


class AnuncioController extends Controller
{
    protected $auth;
   
    //vamos a declarar un constructor:
    public function __construct(Guard $auth)
    {
        //le diremos que gestione el acceso por usuario 
        $this->middleware('auth');
        $this->auth =$auth;


    }

    public function index(){

    //Obtiene el id del usuario logueado
        $query=$this->auth->user()->id;

        $anuncios = DB::table('orden as o')
         ->join ('anuncio as a', 'o.id_anuncio', '=' ,'a.id_anuncio')
         ->where('o.id_secretaria','=',$query)   
         ->where('a.condicion','=',0)  
         ->select('a.titulo','a.descripcion','a.condicion','a.id_anuncio')
         ->paginate(5);


       return view('anuncios.index', ["anuncios" => $anuncios]);

       
    }

    public function create(){
       return view('');
    }

    public function store(Request $request){ 

   }

       public function update($id_anuncio)
    {

        DB::table('anuncio as a')
        ->where('a.id_anuncio', '=' ,$id_anuncio)
        ->update(['condicion' => 1]);
   
       return Redirect::to('anuncios');
 

    }
  }