@extends('layouts.app')

@section('template_title')
    {{ $rfield->name ?? "{{ __('Show') Rfield" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Rfield</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rfields.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $rfield->title }}
                        </div>
                        <div class="form-group">
                            <strong>Field Name:</strong>
                            {{ $rfield->field_name }}
                        </div>
                        <div class="form-group">
                            <strong>Field Type:</strong>
                            {{ $rfield->field_type }}
                        </div>
                        <div class="form-group">
                            <strong>Filed Value:</strong>
                            {{ $rfield->filed_value }}
                        </div>
                        <div class="form-group">
                            <strong>Field Sub:</strong>
                            {{ $rfield->field_sub }}
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $rfield->role }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $rfield->status }}
                        </div>
                        <div class="form-group">
                            <strong>Creted At:</strong>
                            {{ $rfield->creted_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
