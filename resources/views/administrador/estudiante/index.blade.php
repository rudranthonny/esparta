@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <div class="text-center h1" id="titulo">Bienvenido a la lista de Estudiantes</div>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
  <div id="listaestudiante">
    @livewire('show-estudiantes')
  </div> 
  <div id="listadocarnet" style="display: none">
    @livewire('emitir-carnet')
  </div> 
  @livewireScripts
  <br>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
    #titulo {
    background: cornflowerblue;
    border-radius: 20px;
    padding: 10px;
    color: white;
    }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
  <script>
    function emitircarnet(){
      agregar = document.getElementById('agregar');
      emitircarnet = document.getElementById('emitircarnet');
      listadocarnet = document.getElementById('listadocarnet');
      listaestudiante = document.getElementById('listaestudiante');
      agregar.style.display ="none";
      emitircarnet.style.display ="none";
      listaestudiante.style.display ="none";
      listadocarnet.style.display ="block";
    }
  </script>  
  <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar'))
    <script>Swal.fire(
   'Eliminado!',
'Tu registro ha sido eliminado.',
    'success'
    )</script>
    @endif
    
     @if (session('tienepagos'))
    <script>Swal.fire(
    'No se puede realizar esta función',
    'El estudiante tiene pagos',
    'success'
    )</script>
    @endif


    <script>
      function eliminar(a){
        Swal.fire({
  title: 'Estas Seguro de Eliminar',
  text: "Una vez se elimine ya no se podra restaurar el registro",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, !Eliminar Esto!'
}).then((result) => {
  if (result.isConfirmed) {
    document.getElementById(a).submit()
  }
})
      }
    </script>
@stop