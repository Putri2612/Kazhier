{{ Form::model($bankAccount, array('route' => array('bank-account.update', $bankAccount->id), 'method' => 'PUT', 'onsubmit' => 'return validateCurrencyInput(this)')) }}
<div class="row">
    <div class="form-group  col-md-6">
        {{ Form::label('holder_name', __('Bank Holder Name')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-address-card"></i>
                </div>
            </div>
            {{ Form::text('holder_name', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('bank_name', __('Bank Name')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-university"></i>
                </div>
            </div>
            {{ Form::text('bank_name', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('account_number', __('Account Number')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical"></i>
                </div>
            </div>
            {{ Form::text('account_number', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('opening_balance', __('Opening Balance')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
            {{ Form::text('opening_balance', null, array('class' => 'form-control','required'=>'required', 'data-is-number')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('contact_number', __('Contact Number')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>
            {{ Form::text('contact_number', null, array('class' => 'form-control','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('bank_address', __('Bank Address')) }}
        {{ Form::textarea('bank_address', null, array('class' => 'form-control','required'=>'required')) }}
    </div>
    @if(!$customFields->isEmpty())
        <div class="col-md-12">
            <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                @include('customFields.formBuilder')
            </div>
        </div>
    @endif
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}



