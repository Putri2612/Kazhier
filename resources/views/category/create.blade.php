{{ Form::open(array('route' => ['category.store', ['type' => $type]], 'autocomplete' => 'off')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Category Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('color', __('Category Color')) }}
        {{ Form::text('color', '', array('class' => 'form-control jscolor','required'=>'required')) }}
        <p class="small">{{__('For chart representation')}}</p>
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
<script>
    if(typeof suggestions === 'undefined'){
        let suggestions   = new Suggestion.CreateList('input[name="name"]', @json($suggestions));
    } else {
        suggestions   = new Suggestion.CreateList('input[name="name"]', @json($suggestions));
    }
</script>
{{ Form::close() }}

