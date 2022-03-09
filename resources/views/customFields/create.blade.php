{{ Form::open(array('route' => 'custom-field.store')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{Form::label('name',__('Custom Field Name'))}}
        {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
    </div>
    <div class="form-group  col-md-12">
        <div class="input-group">
            {{ Form::label('type', __('Type')) }}
            {{ Form::select('type',$types,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-12">
        <div class="input-group">
            {{ Form::label('module', __('Module')) }}
            {{ Form::select('module',$modules,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}