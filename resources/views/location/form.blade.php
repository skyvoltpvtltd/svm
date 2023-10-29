<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('city') }}
            {{ Form::text('city', $location->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'City']) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state_Name') }}

            @php
$states = DB::table('states')->get();
$data = array();
@endphp
@foreach($states as $val)
@php $data[$val->id]= $val->name; @endphp
@endforeach


             {{ Form::select('state_id', $data ,$location->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : '')]); }}



            <!-- {{ Form::text('state_id', $location->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'State Id']) }} -->
            {!! $errors->first('state_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>