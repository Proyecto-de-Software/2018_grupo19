@extends('layouts.index', ['resources' => $pacientes, 'title' => "pacientes"])

@section('item-list')
    @foreach ($pacientes as $resource)
        <tr>
            <td class="table-text"><div>{{ $resource->nombre . ' ' . $resource->apellido }}</div></td>
            <td>
                <!-- Boton mas info -->
                <form action="{{ url('pacientes/'.$resource->id) }}">
                    {{ csrf_field() }}

                    <button type="submit" class="btn">
                        <i class="fa fa-btn fa-trash"></i>Mas info 
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
@section('pagination')
<div class="text-center">
{{ $pacientes->links() }}
</div>
@endsection