{{ Form::open(array('route' => 'account-assets.store')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('amount', __('Amount')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
        {{ Form::text('amount', '', ['class' => 'form-control', 'required'=>'required', 'data-is-number']) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('purchase_date', __('Purchase Date')) }}
        {{ Form::text('purchase_date','', array('class' => 'form-control datepicker')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('supported_date', __('Supported Date')) }}
        {{ Form::text('supported_date','', array('class' => 'form-control datepicker')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type', __('Type')) }}
        {{ Form::select('type', $types, null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', '', array('class' => 'form-control')) }}
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}

