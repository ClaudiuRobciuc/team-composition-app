@extends('layouts.master')

@section('content')
<h1 style="margin: 25px 0px 25px 0px">Team Composition in {{$project->title}}</h1>
<h3 style="margin: 25px 0px 25px 0px">Key Words: {{$project->requirements}}</h2>

<h3 style="margin: 25px 0px 25px 0px">Asigned to the project</h2>
<table class="table" id="asignedSigniflyers">
    <thead>
      <tr>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    
    @if(!empty($project->signiflyers))
        @foreach($project->signiflyers as $s)
            <tr>
                <td>{{$s->email}}</td>
                <td>{{$s->role->role}}</td>
                <td><a class="btn btn-primary" data-id="{{$s->id}}" role="button" id="remove-btn">Remove from Project</a></td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<h3 style="margin: 25px 0px 25px 0px">Available Signiflyers</h2>
<table class="table" id="availableSigniflyers">
    <thead>
      <tr>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Skillset</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @if($signiflyers->count())
        @foreach($signiflyers as $s)
            @if($s->available())
            <tr>
                <td>{{$s->email}}</td>
                <td>{{$s->role->role}}</td>
                <td>{{$s->skillset}}</td>
                <td><a class="btn btn-primary" data-id="{{$s->id}}" role="button" id="asign-btn">Asign To Project</a></td>
            </tr>
            @endif
        @endforeach
    @endif
    </tbody>
</table>

{!! Form::open([
    'method' => 'POST',
    'role' => 'form' ,
    'class' => 'form-horizontal form-validate-jquery',
    'id' => 'asign',
    'url' => route('signifly.project.asign', ['projectid' => $project->id])
    ])
!!}
    {!! Form::hidden('id', '', ['id' => 'asign_signiflyer_id']) !!}
{!! Form::close() !!}

{!! Form::open([
    'method' => 'POST',
    'role' => 'form' ,
    'class' => 'form-horizontal form-validate-jquery',
    'id' => 'remove',
    'url' => route('signifly.project.remove', ['projectid' => $project->id])
    ])
!!}
    {!! Form::hidden('id', '', ['id' => 'remove_signiflyer_id']) !!}
{!! Form::close() !!}
@stop

@section('inlinescripts')
<script>
    function asign() {
        id = $(this).attr('data-id');
        $('#asign_signiflyer_id').val(id);
        $('#asign').submit();
    }

    function remove() {
        id = $(this).attr('data-id');
        $('#remove_signiflyer_id').val(id);
        $('#remove').submit();
    }

    jQuery(document).ready(function() {
        $('body').on('click', '#remove-btn', remove);
        $('body').on('click', '#asign-btn', asign);
    });

</script>
@stop

