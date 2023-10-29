@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Rfield
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Rfield</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rfields.update', $rfield->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('rfield.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
