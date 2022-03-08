<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Aula;
use App\Models\Ciclo;
use App\Models\Matricula;
use App\Models\Modalidad;
use App\Models\Turno;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    private $token = 'ff63b816357ee3098eb0504de43be96c';
    private $domainname = 'https://jademlearning.com/aula5';
    //private $token = 'b30e7aa926d7b2439f6dd6157881bba4';
    //private $domainname = 'https://corporacionesparta.edu.pe/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.estudiante.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciclos = Ciclo::all();
        $aulas = Aula::all();
        $areas = Area::all();
        $turnos = Turno::all();
        $modalidades = Modalidad::all();
        return view('administrador.estudiante.crear',compact('ciclos','aulas','areas','turnos','modalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //validación
          $request->validate([
            /*DatosPersonales*/
            'name' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'ap_paterno' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'ap_materno' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'dni' => 'numeric|required|unique:users|digits:8',
            'email' => 'required|email|unique:users',
            /*Contacto*/
            /*Datos de ubicación*/
            /*datos de Matricula*/
            /*
            'fechainicio' => 'required|date',
            'ciclo_id' => 'required',
            'area_id' => 'required',
            'turno_id' => 'required',
            'aula_id' => 'required',
            'modalidad_id' => 'required',*/
            /*imagen de perfil*/
            /*'profile_photo_path' =>'image|max:2048'*/
        ]);
    
        //return $urlimagen;
        //generar el codigo del estudiante
        $now = Carbon::now();
            $year = $now->format('Y');
            $codigo = $year.mt_rand(1000, 9999);
            $student = User::where('codigo',$codigo)->first();
            while($student == true){
                $codigo = $year.mt_rand(0001, 9999);
                $student = User::where('codigo',$codigo)->first();
        }/*
        //subir imagen al repositorio
        if( $request->profile_photo_path != null){ 
        $extension = $request->profile_photo_path->extension();
        $imagenperfil = $request->file('profile_photo_path')->storeAs('public/usuarios',$request->input('dni').".".$extension);
        $urlimagen = Storage::url($imagenperfil);
        }
        else
        {
            $urlimagen = "";  
        }*/
        //crear el estudiante
        $user = User::create($request->only('name','ap_paterno','ap_materno','dni','email')+[
                'codigo' => $codigo,
                'password' => bcrypt($codigo),
                'carnet' => '0',
        ]);

        $functionname = 'core_user_create_users';
        $serverurl = $this->domainname. '/webservice/rest/server.php'
        . '?wstoken=' . $this->token 
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json&users[0][username]='.$request->input('email').'&users[0][password]=123456789&users[0][firstname]='.$request->input('name').'&users[0][lastname]='.$request->input('ap_paterno')." ".$request->input('ap_materno').'&users[0][email]='.$request->input('email').'&users[0][phone1]=9999999999&users[0][country]=PE';
        $usuario = Http::get($serverurl);
        //matricular el estudiante
        /*$estudiante = User::where('codigo',$codigo)->first();
        $matricula = Matricula::create([
                'fechainicio' => $request->input('fechainicio'),
                'user_id' => $estudiante->id,
                'turno_id'  =>  $request->input('turno_id'),
                'ciclo_id' => $request->input('ciclo_id'),
                'area_id' =>  $request->input('area_id'),
                'modalidad_id' =>  $request->input('modalidad_id'),
                'aula_id' => $request->input('aula_id'),
            ]);*/
        return redirect()->route('admin.estudiantes.index')->with('info','se creo el estudiante correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
