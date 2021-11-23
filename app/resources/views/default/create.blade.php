{{ Form::open(array('url' => 'defaults', 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
        @error('name')
        <span class="invalid-name" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type', __('Type')) }}
        {{ Form::text('type', '', array('class' => 'form-control', 'required' => 'required', 'list' => 'types')) }}
        <datalist id="types">
            @foreach ($types as $type)
                <option value="{{$type}}">
            @endforeach
        </datalist>
        @error('type')
        <span class="invalid-type" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('color', __('Category Color')) }}
        {{ Form::text('color', '', array('class' => 'form-control jscolor','required'=>'required')) }}
        <p class="small">{{__('For chart representation')}}</p>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('value', __('Value')) }}
        {{ Form::text('value', '', array('class' => 'form-control','data-is-number')) }}
        @error('value')
        <span class="invalid-value" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
