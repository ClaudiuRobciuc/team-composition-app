@extends('layouts.master')

@section('content')
    <h1 style="margin: 25px 0px 25px 0px">Edit Signiflyer</h1>
    <div class="portlet-body">
        {!! Form::open([
                'method' => 'POST',
                'role' => 'form' ,
                'class' => 'form-horizontal form-validate-jquery',
                'id' => 'store',
                'files' => true,
                'url' => route('signifly.signiflyers.store')
            ])
        !!}
        <div class="form-body">
            <div class="form-group">
                <label class="control-label col-md-3">First Name<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::text(
                            'first_name',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Last Name<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::text(
                            'last_name',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::text(
                            'email',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Phone Number<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::text(
                            'phone_number',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'Phone Number', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Education<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::text(
                            'education',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'Education', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Job Role<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::select(
                        'role_id',
                        ['' => 'Select Job Role'] + $roles,
                        '',
                        ['class' => 'form-control', 'required' => 'true']
                    )
                !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Skills<span class="required"> * </span></label>
                <div class="col-md-4">
                    {!! Form::textarea(
                            'skillset',
                            '',
                            ['class' => 'form-control', 'placeholder' => 'Skill sets', 'required' => 'true']
                        )
                    !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Profile Picture</label>
                <div class="col-md-4">
                   {!! Form::file('file') !!}
                </div>
            </div>
            <div class="form-actions" style="margin-top:20px">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ URL::previous() }}" class="btn btn-warning">Back</a>
                    </div>
                    <div class="col-md-10 text-right">
                        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
