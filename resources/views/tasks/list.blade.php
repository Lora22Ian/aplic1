@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista sarcinilor
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="pull-right">
                    <a href="/tasks/create" class="btn btn-default">Adaugare Sarcina Noua</a>
                </div>
            </div>

            <table class="table table-bordered table-stripped">
                <tr>
                    <th width="20">No</th>
                    <th>Titlu</th>
                    <th>Descriere</th>
                    <th width="300">Actiune</th>
                </tr>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('tasks.show', $task->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{ route('tasks.edit', $task->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista sarcini!</td>
                    </tr>
                @endif
            </table>
            
            <!-- Introduce nr pagina -->
            {{ $tasks->render() }}
        </div>
    </div>
@endsection
