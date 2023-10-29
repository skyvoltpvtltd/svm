@extends('layouts.app')

@section('template_title')
    Rfield
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Manage Custom Fields') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('rfields.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										
										<th>Field Type</th>
										
										<th>Role</th>
										<th>Required - Yes/No</th>
									

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rfields as $rfield)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $rfield->name }}</td>
										
											<td>{{ $rfield->field_type }}</td>
											
											<td>
@php

$result = DB::table('roles')->where('id',$rfield->role)->first();

@endphp

                                                {{ $result->name }}</td>
											<td>{{ $rfield->status }}</td>
									

                                            <td>
                                                <form action="{{ route('rfields.destroy',$rfield->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('rfields.show',$rfield->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('rfields.edit',$rfield->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rfields->links() !!}
            </div>
        </div>
    </div>
@endsection
