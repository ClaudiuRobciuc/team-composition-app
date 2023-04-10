@extends('layouts.master')

@section('content')
<h1 style="margin: 25px 0px 25px 0px">All Signifly Projects</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Team Asigned</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @if($projects->count())
        @foreach($projects as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->title}}</td>
            <td>{{$p->start_date}}</td>
            <td>{{$p->end_date}}</td>
            <td>{{count($p->signiflyers) ? 'Yes' : 'No'}}</td>
            <td><a class="btn btn-primary" href="{{route('signifly.project.view', ['id' => $p->id])}}" role="button">Asign Team</a></td>
        </tr>
        @endforeach
    @endif
    </tbody>
  </table>
@stop