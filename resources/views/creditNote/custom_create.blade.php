{{ Form::open(array('route' => array('invoice.custom.credit.note.store'),'method'=>'post', 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="col-md-12">
        <div class="input-group">
            {{ Form::label('invoice', __('Invoice')) }}
            <select class="form-control customer-sel font-style selectric" required="required" id="invoice" name="invoice" >
                <option value="0">{{__('Select Invoice')}}</option>
                @foreach($invoices as $key=>$invoice)
                    <option value="{{$key}}">{{\Auth::user()->invoiceNumberFormat($invoice)}}</option>
                @endforeach
            </select>
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
            {{ Form::text('amount', null, array('class' => 'form-control','required'=>'required','data-is-number')) }}
        </div>
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('date', __('Date')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="far fa-money-bill-alt"></i>
                </div>
            </div>
            {{ Form::text('date','', array('class' => 'form-control datepicker')) }}
        </div>
    </div>

    <div class="form-group col-md-12">
        {{ Form::label('description', __('Description')) }}
        {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}
