<div class="box box-info padding-1">
    <div class="box-body">
        @php
$roles = DB::table('roles')->get();
$data = array();
@endphp
@foreach($roles as $val)
@php $data[$val->id]= $val->name; @endphp
@endforeach

<?php
#echo "<pre>";
#print_r($data);die; ?>

                <div class="form-group">
            {{ Form::label('role') }}
            {{ Form::select('role',$data, $rfield->role, ['class' => 'form-control' . ($errors->has('role') ? ' is-invalid' : ''), 'placeholder' => 'Select Role']) }}
            {!! $errors->first('role', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Name') }}
            {{ Form::text('name', $rfield->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
<!--         <div class="form-group">
            {{ Form::label('field_name') }}
            {{ Form::text('field_name', $rfield->field_name, ['class' => 'form-control' . ($errors->has('field_name') ? ' is-invalid' : ''), 'placeholder' => 'Field Name']) }}
            {!! $errors->first('field_name', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <div class="form-group">
            {{ Form::label('field_type') }}
            {{ Form::select('field_type', array('text'=>'text','select'=>'select'),$rfield->field_type, ['class' => 'form-control' . ($errors->has('field_type') ? ' is-invalid' : ''), 'placeholder' => 'Select Field Type']) }}
            {!! $errors->first('field_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('filed_value') }}
            {{ Form::text('filed_value', $rfield->filed_value, ['class' => 'form-control' . ($errors->has('filed_value') ? ' is-invalid' : ''), 'placeholder' => 'Filed Value seprate by |']) }}
            {!! $errors->first('filed_value', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Sub Title') }}
            {{ Form::text('field_sub', $rfield->field_sub, ['class' => 'form-control' . ($errors->has('field_sub') ? ' is-invalid' : ''), 'placeholder' => 'Sub Title']) }}
            {!! $errors->first('field_sub', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Required') }}
            {{ Form::select('status', array("yes"=>"yes","no"=>"no"),$rfield->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Select Required']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Title') }}
            {{ Form::select('title', array('solar module'=>'solar module','solar inverter'=>'solar inverter','wiring'=>'wiring','safty bom'=>'safty bom','structure'=>'structure'),$rfield->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Select Field Type']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>