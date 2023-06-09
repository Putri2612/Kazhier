{{ Form::open(array('route' => 'payment-method.store')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('name', __('Payment Method')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-credit-card"></i>
                </div>
            </div>
            {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
<script>
    new Suggestion.CreateList('input[name="name"]', @json($defaults));
</script>
{{ Form::close() }}
