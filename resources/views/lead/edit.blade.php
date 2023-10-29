@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Lead
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                         <div class="float-left">
                            <h1 class="h3 mb-0 text-gray-800">Edit Lead</h1>
                             </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('leads.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('leads.update', $lead->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lead.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
