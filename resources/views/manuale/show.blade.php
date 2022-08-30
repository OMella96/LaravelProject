@extends('layouts.app')

@section('template_title')
    {{ $manuale->name ?? 'Show Manuale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <a class="btn btn-primary" href="{{ route('manuales.index') }}"> Volver</a>
                        </div>
                        <div class="float-right">
                            <span class="card-title">Mostrar Manual</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $manuale->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Copyright:</strong>
                            {{ $manuale->copyright }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
