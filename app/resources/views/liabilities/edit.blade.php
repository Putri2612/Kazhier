{{ Form::model($liability, array('route' => array('account-liabilities.update', $liability->id), 'method' => 'PUT')) }}

<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name')) }}
        {{ Form::text('name', null, array('class' => 'form-control','required'=>'required')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('amount', __('Amount')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
        {{ Form::number('amount', null, array('class' => 'form-control','required'=>'required','step'=>'1000')) }}
        </div>
    </div>

    <div class="form-group  col-md-6">
        {{ Form::label('date', __('Date')) }}
        {{ Form::text('date',null, array('class' => 'form-control datepicker')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('due_date', __('Due Date')) }}
        {{ Form::text('due_date',null, array('class' => 'form-control datepicker')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type', __('Type')) }}
        {{ Form::select('type', $types, null, array('class' => 'form-control customer-sel font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}




