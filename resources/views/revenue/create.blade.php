{{ Form::open(array('route' => 'revenue.store', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="form-group  col-md-6">
        {{ Form::label('date', __('Date')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('amount', __('Amount')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
            {{ Form::text('amount', '', array('class' => 'form-control','required'=>'required','data-is-number')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('account_id', __('Account')) }}
            {{ Form::select('account_id',$accounts,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('customer_id', __('Customer')) }}
            {{ Form::select('customer_id', $customers,null, array('class' => 'form-control customer-sel font-style selectric', 'data-is-required')) }}
        </div>
    </div>
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description')) }}
        {{ Form::textarea('description', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('category_id', __('Category')) }}
            {{ Form::select('category_id', $categories,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        <div class="input-group">
            {{ Form::label('payment_method', __('Payment Method')) }}
            {{ Form::select('payment_method', $payments,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('reference', __('Reference')) }}
        <div class="input-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div>
                    <span class="btn btn-file btn-secondary">
                        <span class="fileinput-new"><i class="fas fa-paperclip"></i></span>
                        <span class="fileinput-exists"><i class="fa fa-undo"></i></span>
                        <input type="hidden">
                        <input type="file" name="reference" id="">
                    </span>
                    <span class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fas fa-times"></i></span>
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h1"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
