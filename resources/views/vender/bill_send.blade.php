
{{ Form::open(array('route' => array('vender.bill.send.mail',$bill_id))) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('email', __('Email')) }}
        {{ Form::text('email', '', array('class' => 'form-control','required'=>'required')) }}
        @error('email')
        <span class="invalid-email" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
    {{Form::submit(__('Send'),array('class'=>'btn btn-primary'))}}
</div>
{{ Form::close() }}

