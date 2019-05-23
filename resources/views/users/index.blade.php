@extends('layouts.index', ['resources' => $users, 'title' => "users"])

@section('item-list')
    @foreach ($users as $resource)
        <tr>
            <td class="table-text"><div>{{ $resource->name }}</div></td>
            <td>
                <!-- Boton mas info -->
                <form action="{{ url('users/'.$resource->id) }}">
                    {{ csrf_field() }}

                    <button type="submit" class="btn">
                        <i class="fa fa-btn fa-trash"></i>Mas info 
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection