@extends('layouts.app')

@section('template_title')
{{ $lead->name ?? "{{ __('Show') Lead" }}
@endsection

@section('content')
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="float-left">
<h1 class="h3 mb-0 text-gray-800">Show Lead</h1>
</div>
<div class="float-right">
<a class="btn btn-primary" href="{{ route('leads.index') }}"> {{ __('Back') }}</a>
</div>
</div>

<div class="card-body">
<table class="table table-bordered table-sm">

<tbody>
<tr>
<td>Client Name</td>
<td>:</td>
<td> {{ $lead->client_name }}</td>

</tr>
<tr>
<td>Mobile No</td>
<td>:</td>
<td> {{ $lead->mobile_no }}
</td>
</tr>
<tr>
<td>Project Type</td>
<td>:</td>
<td>  {{ $lead->project_type }}
</td>
</tr>
<tr>
    <td>Solar Requirment</td>
    <td>:</td>
    <td>{{ $lead->solar_requirment }}</td>
</tr>
<tr>
    <td>Lead Source</td>
    <td>:</td>
    <td>{{ $lead->lead_source }}</td>
</tr>
<tr>
    <td>Capicity</td>
    <td>:</td>
    <td>{{ $lead->capicity }}<b>  {{ $lead->capicity_unit }}</b></td>
</tr>
<tr>
    <td>Address</td>
    <td>:</td>
    <td>{{ $lead->address }}</td>
</tr>
<tr>
    <td>State</td>
    <td>:</td>
    <td>{{ $lead->state }}</td>
</tr>
<tr>
    <td>District</td>
    <td>:</td>
    <td>{{ $lead->district }}</td>
</tr>
<tr>
    <td>Client Response</td>
    <td>:</td>
    <td>{{ $lead->client_response }}</td>
</tr>
<tr>
    <td>Other Remark</td>
    <td>:</td>
    <td>{{ $lead->other_remark }}</td>
</tr>
</tbody>
</table>
<hr>
@php
$lead_data = DB::table('form_fields')->where('lead_id',$lead->id)->get();


@endphp
<table class="table table-bordered table-sm">
    <tbody>
@foreach($lead_data as $clead)
<tr>
    <td style="text-transform: capitalize;">{{ str_replace('_', ' ', $clead->data_key) }}</td>
    <td>:</td>
    <td>{{ $clead->data_value }} @if(!empty($clead->sub))({{ $clead->sub }}) @endif</td>
</tr>

@endforeach
</tbody>
</table>

<hr>
</div>


<form action="{{ route('cfields') }}" method="post">
    @csrf
<div class="card-body">
    <h3>Fill Form Details</h3>
    <hr>
    <div class="row">

@php   
$customform=DB::table('rfields')->get()
@endphp

   @foreach($customform as $val)
   @php
$slug = str_replace(' ', '_', $val->name );
$slug = strtolower($slug);
@endphp
@if($val->field_type=='text')

         <div class="col-md-6 mb-3">
            <label for="firstName">{{ $val->name }}</label>
            <input type="{{ $val->field_type }}" class="form-control"  @if( $val->status =='yes' ) required @endif placeholder="Enter {{ $val->name }}" name="alldata[{{ $slug }}]">
           
          </div> 
@elseif($val->field_type=='select')

 <div @if(!empty($val->field_sub)) class="col-md-5 mb-2" @else class="col-md-6 mb-3" @endif>
            
            <label for="firstName">{{ $val->name }}</label>
          <select class="form-control" @if( $val->status =='yes' ) required @endif name="alldata[{{ $slug }}]">
              <option value=''>Select {{ $val->name }}</option>
              @php
$field_value = $val->filed_value;
$field_value = explode('|',$field_value);

              @endphp
              @foreach($field_value as $cval)
<option value="{{ $cval }}|{{ $val->field_sub }}">{{ $cval }}</option>
              @endforeach
          </select>
           
          </div> 
          <div class="col-md-1 mb-1">
            <label for="firstName">&nbsp;</label>
           <div> {{ $val->field_sub }}</div>
          </div>
          @endif

          @endforeach
       


</div>
<input type="hidden" value="{{ $lead->id }}" name="leadid" />
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>



</div>
</div>
</div>
</section>
@endsection
