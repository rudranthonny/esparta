@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><center></center></h1>
@stop

@section('content')
<div class="m-3">
    <a class="btn btn-success" href="{{route('admin.estudiantes.index')}}" role="button">Regresar</a>
</div>
<br>
<form action="{{route('admin.estudiantes.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<!--imagen de perfil-->
<div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-header"><center><h1>Imagen de Perfil</h1></center></div>
            <div class="card-body">
                @livewire('change-perfil')
                @livewireScripts
            </div>
            </div>
        </div>
      </div>
</div>
<!--Datos Personales && Contacto-->
<div class="container">
    <div class="row">
      <div class="col">
          <!--Datos Personales-->
        <div class="card">
            <center><div class="card-header"><h3><strong>Datos Personales</strong><h3></div></center>
            <div class="card-body row">
                        <div class="mb-3 col-6">
                        <label for="name" class="form-label">Nombres <strong style="color:red">(*)</strong></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="ap_paterno" class="form-label">Paterno <strong style="color:red">(*)</strong></label>
                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{old('ap_paterno')}}">
                        @error('ap_paterno')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="ap_materno" class="form-label">Materno <strong style="color:red">(*)</strong></label>
                        <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{old('ap_materno')}}">
                        @error('ap_materno')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="dni" class="form-label">DNI <strong style="color:red">(*)</strong></label>
                        <input type="text" class="form-control" id="dni" name="dni" value={{old('dni')}}>
                        @error('dni')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <strong style="color:red">(*)</strong></label>
                        <input type="text" class="form-control" id="email" name="email" value={{old('email')}}>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
        </div>
      </div>
      <div class="col">
          <!--Contactos-->
        <div class="card">
            <center><div class="card-header"><h3><strong>Contacto</strong><h3></div></center>
            <div class="card-body row">
                    <div class="mb-3">
                        <label for="fechanac" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fechanac" name="fechanac" value={{old('fechanac')}}>
                        @error('fechanac')  
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="fijo" class="form-label">Fijo</label>
                        <input type="text" class="form-control" id="fijo" name="fijo" value={{old('fijo')}}>
                        @error('fijo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="celular" class="form-label">celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value={{old('celular')}}>
                        @error('celular')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="apoderado" class="form-label">Apoderado</label>
                        <input type="text" class="form-control" id="apoderado" name="apoderado" value={{old('apoderado')}}>
                        @error('apoderado')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="apoderado_phone" class="form-label">Telefono del Apoderado</label>
                        <input type="text" class="form-control" id="apoderado_phone" name="apoderado_phone" value={{old('apoderado_phone')}}>
                        @error('apoderado_phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<!--Datos de Ubicación y Matricula-->
<div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
            <center><div class="card-header"><h3><strong>Datos de Ubicación</strong><h3></div></center>
            <div class="card-body row">
                    <div class="mb-3 col-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value={{old('direccion')}}>
                        @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="distrito" class="form-label">Distrito</label>
                        <input type="text" class="form-control" id="distrito" name="distrito" value={{old('distrito')}}>
                        @error('distrito')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="referencia" class="form-label">Referencia</label>
                        <input type="text" class="form-control" id="referencia" name="referencia" value={{old('referencia')}}>
                        @error('referencia')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value={{old('ubicacion')}}>
                        @error('ubicacion')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
            <center><div class="card-header"><h3><strong>Datos de Matricula</strong><h3></div></center>
            <div class="card-body row">
                <div class="mb-3 col-6">
                    <label for="nacionalidad" class="form-label">Ciclo <strong style="color:red">(*)</strong></label>
                    <select class="form-select" aria-label="Default select example" name='ciclo_id' required value={{old('ciclo_id')}}>
                        <option>Sel. una opción</option>
                        @foreach ($ciclos as $ciclo)
                        <option value="{{$ciclo->id}}">{{$ciclo->name}}</option>
                        @endforeach
                      </select>
                      @error('ciclo_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="turno" class="form-label">Turno <strong style="color:red">(*)</strong></label>
                    <select class="form-select" aria-label="Default select example" name='turno_id' required value={{old('turno_id')}}>
                        <option >Sel. una opción</option> 
                        @foreach ($turnos as $turno)
                        <option value="{{$turno->id}}">{{$turno->name}}</option>
                        @endforeach
                      </select>
                      @error('turno_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="nacionalidad" class="form-label">Area <strong style="color:red">(*)</strong></label>
                    <select class="form-select" aria-label="Default select example" name='area_id' required value={{old('area_id')}}>
                        <option>Sel. una opción</option>
                        @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                      </select>
                      @error('area_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="nacionalidad" class="form-label">Modalidad <strong style="color:red">(*)</strong></label>
                    <select class="form-select" aria-label="Default select example" name='modalidad_id' required value={{old('modalidad_id')}}>
                        <option>Sel. una opción</option>
                        @foreach ($modalidades as $modalidad)
                        <option value="{{$modalidad->id}}">{{$modalidad->name}}</option>
                        @endforeach
                      </select>
                      @error('modalidad_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="nacionalidad" class="form-label">Aula<strong style="color:red">(*)</strong></label>
                    <select class="form-select" aria-label="Default select example" name='aula_id' required value={{old('aula_id')}}>
                        <option>Sel. una opción</option>
                        @foreach ($aulas as $aula)
                        <option value="{{$aula->id}}">{{$aula->name}}</option>
                        @endforeach
                      </select>
                      @error('aula_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="fnacimiento" class="form-label">Fecha de Inicio <strong style="color:red">(*)</strong></label>
                    <input type="date" class="form-control" id="fechainicio" name="fechainicio" value={{old('fechainicio')}}>
                    @error('fechainicio')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<div class="my-12">
    <center><button type="submit" class="btn btn-primary">Crear Estudiantes</button></center><br>
</div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop