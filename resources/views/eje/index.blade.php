@extends('layouts.app')

@section('template_title')
    Ejes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Eje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ejes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear +') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Manual</th>
										<th>Nombre</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ejes as $eje)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $eje->manuale->nombre }}</td>
											<td>{{ $eje->nombre }}</td>
											<td>{{ $eje->descripcion }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ejes.show',$eje->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ejes.edit',$eje->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                <form action="{{ route('ejes.destroy',$eje->id) }}" class="d-inline" method="POST" onclick="return confirm('Desea borrar?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ejes->links() !!}
            </div>
        </div>
    </div>
@endsection
