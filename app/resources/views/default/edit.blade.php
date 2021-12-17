{{ Form::model($Default, array('route' => array('defaults.update', $Default->id), 'method' => 'PUT', 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name')) }}
        {{ Form::text('name', null, array('class' => 'form-control font-style','required'=>'required')) }}
        @error('name')
        <span class="invalid-name" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type', __('Type')) }}
        {{ Form::text('type', null, array('class' => 'form-control','required'=>'required')) }}
        @error('type')
        <span class="invalid-type" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('color', __('Category Color')) }}
        {{ Form::text('color', null, array('class' => 'form-control jscolor','required'=>'required')) }}
        <p class="small">{{__('For chart representation')}}</p>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('value', __('Value')) }}
        {{ Form::text('value', null, array('class' => 'form-control','data-is-number')) }}
        @error('value')
        <span class="invalid-value" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
