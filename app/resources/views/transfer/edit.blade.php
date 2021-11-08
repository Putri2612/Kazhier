{{ Form::model($transfer, array('route' => array('transfer.update', $transfer->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
@php
    $ref = asset(Storage::url('reference/'));
@endphp

<div class="row">
    <div class="form-group  col-md-6">
        {{ Form::label('from_account', __('From Account')) }}
        {{ Form::select('from_account', $bankAccount,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('to_account', __('To Account')) }}
        {{ Form::select('to_account', $bankAccount,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
    </div>
    <div class="form-group  col-md-6">
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
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('date', null, array('class' => 'form-control datepicker','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('payment_method', __('Payment Method')) }}
        {{ Form::select('payment_method', $paymentMethod,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
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
                <div class="fileinput-new">{{$transfer->reference}}</div>
                <div class="fileinput-new thumbnail h-150">
                    <img src="{{$ref.'/'.$transfer->reference.'?'.rand()}}" alt="">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h1"></div>
            </div>
        </div>
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




