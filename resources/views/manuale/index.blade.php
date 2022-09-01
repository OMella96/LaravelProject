@extends('layouts.app')

@section('template_title')
    Manuales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Manuales') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('manuales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Id</th>

										<th>Nombre</th>
										<th>Copyright</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manuales as $manuale)
                                        <tr>
                                            <td>{{ $manuale->id }}</td>

											<td>{{ $manuale->nombre }}</td>
											<td>{{ $manuale->copyright }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('manuales.show',$manuale->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('manuales.edit',$manuale->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                <form action="{{ route('manuales.destroy',$manuale->id) }}" class="d-inline" method="POST" onclick="return confirm('Desea borrar?')">
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
                {!! $manuales->links() !!}
            </div>
        </div>
    </div>
@endsection
