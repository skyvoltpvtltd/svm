@extends('layouts.app1')

@section('template_title')
    Lead
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h1 class="h3 mb-0 text-gray-800">Leads Management</h1>

                             <div class="float-right">
                                <a href="{{ route('leads.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
















                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Client Name</th>
										<th>Mobile No</th>
										<th>Project Type</th>
										<!-- <th>Solar Requirment</th>
										<th>Lead Source</th>
										<th>Capicity</th>
										<th>Address</th> -->
										<th>State</th>
										<th>District</th>
										<th>Client Response</th>
										<!-- <th>Other Remark</th> -->

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($leads as $lead)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lead->client_name }}</td>
											<td>{{ $lead->mobile_no }}</td>
											<td>{{ $lead->project_type }}</td>
											<!-- <td>{{ $lead->solar_requirment }}</td>
											<td>{{ $lead->lead_source }}</td>
											<td>{{ $lead->capicity }}</td>
											<td>{{ $lead->address }}</td> -->
											<td>{{ $lead->state }}</td>
											<td>{{ $lead->district }}</td>
											<td>{{ $lead->client_response }}</td>
											<!-- <td>{{ $lead->other_remark }}</td> -->

                                            <td>
                                                <form action="{{ route('leads.destroy',$lead->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('leads.show',$lead->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('leads.edit',$lead->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
              
            </div>
        </div>
    </div>
@endsection
