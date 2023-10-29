@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Lead
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h1 class="h3 mb-0 text-gray-800">Add Lead</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('leads.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('lead.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
