{{ Form::open(array('route' => 'product-unit.store')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Unit Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
        @error('name')
        <span class="invalid-name" role="alert">
        <strong class="text-danger">{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
<script>
    new Suggestion.CreateList('input[name="name"]', @json($unit));
</script>
{{ Form::close() }}
