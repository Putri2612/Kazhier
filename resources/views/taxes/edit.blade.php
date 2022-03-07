{{ Form::model($tax, array('route' => array('taxes.update', $tax->id), 'method' => 'PUT', 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Tax Rate Name')) }}
        {{ Form::text('name', null, array('class' => 'form-control font-style','required'=>'required')) }}
        @error('name')
        <span class="invalid-name" role="alert">
        <strong class="text-danger">{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('rate', __('Tax Rate %')) }}
        {{ Form::text('rate', null, array('class' => 'form-control','required'=>'required','data-is-number')) }}
        @error('rate')
        <span class="invalid-rate" role="alert">
        <strong class="text-danger">{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
