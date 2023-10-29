<div class="box box-info padding-1">
    <div class="box-body row">
           <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('client_name') }}
            {{ Form::text('client_name', $lead->client_name, ['class' => 'form-control' . ($errors->has('client_name') ? ' is-invalid' : ''), 'placeholder' => 'Client Name']) }}
            {!! $errors->first('client_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
       <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('mobile_no') }}
            {{ Form::text('mobile_no', $lead->mobile_no, ['class' => 'form-control' . ($errors->has('mobile_no') ? ' is-invalid' : ''), 'placeholder' => 'Mobile No']) }}
            {!! $errors->first('mobile_no', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('project_type') }}
            {{ Form::select('project_type', array(''=>'Select Project Type','domestic' => 'Domestic', 'commercial' => 'Commercial','other'=>'Other'),$lead->project_type, ['class' => 'form-control' . ($errors->has('project_type') ? ' is-invalid' : '')]); }}
           
            {!! $errors->first('project_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('solar_requirment') }}
            {{ Form::select('solar_requirment', array(''=>'Select Solar Requirment','ongrid' => 'Ongrid', 'offgrid' => 'Offgrid','hybrid'=>'Hybrid','street_light'=>'Street Light','solar_pump'=>'Solar Pump'),$lead->solar_requirment, ['class' => 'form-control' . ($errors->has('solar_requirment') ? ' is-invalid' : '')]); }}


            <!-- {{ Form::text('solar_requirment', $lead->solar_requirment, ['class' => 'form-control' . ($errors->has('solar_requirment') ? ' is-invalid' : ''), 'placeholder' => 'Solar Requirment']) }} -->
            {!! $errors->first('solar_requirment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('lead_source') }}
            <!-- {{ Form::text('lead_source', $lead->lead_source, ['class' => 'form-control' . ($errors->has('lead_source') ? ' is-invalid' : ''), 'placeholder' => 'Lead Source']) }} -->

              {{ Form::select('lead_source', array(''=>'Select Solar Source','indiamart' => 'Indiamart', 'justdial' => 'Justdial','byrefrence'=>'By Refrence','direct'=>'Direct','other'=>'Other'),$lead->lead_source, ['class' => 'form-control' . ($errors->has('lead_source') ? ' is-invalid' : '')]); }}



            {!! $errors->first('lead_source', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('capicity') }}
<div class="row">
     <div class="col-sm-8">
               {{ Form::text('capicity', $lead->capicity, ['class' => 'form-control capicity_field' . ($errors->has('capicity') ? ' is-invalid' : ''), 'placeholder' => 'Capicity']) }}
            {!! $errors->first('capicity', '<div class="invalid-feedback">:message</div>') !!}
</div>
 <div class="col-sm-4">
             {{ Form::select('capicity_unit', array(''=>'Unit Select','kw' => 'KW', 'nos' => 'NOS','ltr'=>'LTR'),$lead->capicity_unit, ['class' => 'form-control capicity_unit' . ($errors->has('capicity_unit') ? ' is-invalid' : '')]); }}
               {!! $errors->first('capicity_unit', '<div class="invalid-feedback">:message</div>') !!}
         </div>
</div>
            
          
        </div>
    </div>
     <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $lead->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">

            {{ Form::label('state') }}
@php
$states = DB::table('states')->get();
$data = array();
@endphp
@foreach($states as $val)
@php $data[$val->name]= $val->name; @endphp
@endforeach

<select id="state" name="state"   class="form-control" onchange="change_city(this.value)">
       <option value="" >Select State</option>
    @foreach($states as $val)
    <option value="{{ $val->name }}" <?php if(!empty($lead->state) && $val->name==$lead->state) { ?> selected <?php } ?> >{{ $val->name }}</option>
    @endforeach
</select>
             <!-- {{ Form::select('state', $data ,$lead->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : '')]); }} -->


        
            {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('district') }}

           @php
$states = DB::table('locations')->get();
$data = array();
@endphp
@foreach($states as $val)
@php $data[$val->city]= $val->city; @endphp
@endforeach


             <!-- {{ Form::select('district', $data ,$lead->district, ['class' => 'form-control' . ($errors->has('district') ? ' is-invalid' : '')]); }} -->

             <select name="district" class="form-control city_result">
                <?php if(!empty($lead->district)) { ?>
   <option value="{{ $lead->district }}">{{ $lead->district }}</option>
                <?php } else { ?>
                <option value="">Select District (First Select State)</option>
            <?php } ?>

                 <!-- <div ></div> -->
             </select>


            {!! $errors->first('district', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('client_response') }}

             {{ Form::select('client_response', array(''=>'Select Client Response','select' => 'Select', 'intreasted' => 'Intreasted','Intreasted But Take Time'=>'Intreasted But Take Time','Call Not Pick Up'=>'Call Not Pick Up','Not Intreasted'=>'Not Intreasted'),$lead->client_response, ['class' => 'form-control' . ($errors->has('client_response') ? ' is-invalid' : '')]); }}



            <!-- {{ Form::text('client_response', $lead->client_response, ['class' => 'form-control' . ($errors->has('client_response') ? ' is-invalid' : ''), 'placeholder' => 'Client Response']) }} -->
            {!! $errors->first('client_response', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
     <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('other_remark') }}
            {{ Form::textarea('other_remark', $lead->other_remark, ['class' => 'form-control' . ($errors->has('other_remark') ? ' is-invalid' : ''), 'placeholder' => 'Other Remark']) }}
            {!! $errors->first('other_remark', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script>
   function change_city(id)
        {


jQuery.ajax({
                  url: "{{ route('change_city') }}",
                  method: 'post',
                  data: {
                    "_token": "{{ csrf_token() }}",
                     "id": id
                   
                  },
                  success: function(result){
                    jQuery(".city_result").html(result);
                    
                  }});



        }

</script>