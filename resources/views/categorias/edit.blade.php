@extends('layout')
@section('title', 'Editar categoría')
@section('content')
    <h3 class="nt-4 mb-3">Editar categoría</h3>
    <form id="form" action="{{ route('categorias.update',$datos->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" value="{{old('nombre',$datos->nombre)}}">
                @error('nombre')
                    <div class="error compacto col-lg-5">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese descripción" value="{{ old('descripcion',$datos->descripcion) }}">
                @error('descripcion')
                    <div class="error compacto col-lg-5">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('categorias') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop()
@section('js')
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/localization/messages_es.min.js') }}"></script>

    <script>

        $("#form").validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 50
                },
                description: {
                    required: true,
                    maxlength: 150
                }
            }
        });

    </script>
@stop()