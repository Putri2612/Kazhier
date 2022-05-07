{{ Form::model($product, ['route' => ['product-stock.update', $operation], 'method' => 'PUT', 'onsubmit' => 'return ValidateForm(event)']) }}
{{ Form::hidden('id', null) }}
<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('name', __('Product Name')) }}
        {{ Form::text('name', null, ['class' => 'form-control-plaintext', 'readonly']) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('date', __('Date')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('date', null, array('class' => 'form-control datepicker','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('amount', __('Amount')) }}
        {{ Form::text('amount', null, ['class' => 'form-control', 'data-is-number', 'required' => 'required']) }}
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__(ucfirst($operation)),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}