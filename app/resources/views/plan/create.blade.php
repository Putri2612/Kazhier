{{ Form::open(array('url' => 'plans', 'enctype' => "multipart/form-data", 'onsubmit' => 'return ValidateForm(event)')) }}
<div class="row">
    <div class="form-group col-md-6">
        {{Form::label('name',__('Name'))}}
        {{Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))}}
    </div>
    <div class="form-group col-md-6">
        {{Form::label('price',__('Price'))}}
        {{Form::text('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'), 'required' => 'required', 'data-is-number'))}}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('duration', __('Duration')) }}
        {!! Form::select('duration', $arrDuration, null,array('class' => 'form-control selectric','required'=>'required')) !!}
    </div>
    <div class="form-group col-md-6">
        {{Form::label('max_users',__('Maximum Users'))}}
        {{Form::text('max_users',null,array('class'=>'form-control','required'=>'required', 'data-is-number'))}}
        <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
    </div>
    {{-- <div class="form-group col-md-6">
        {{Form::label('max_customers',__('Maximum Customers'))}}
        {{Form::text('max_customers',null,array('class'=>'form-control','required'=>'required', 'data-is-number'))}}
        <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
    </div>
    <div class="form-group col-md-6">
        {{Form::label('max_venders',__('Maximum Venders'))}}
        {{Form::text('max_venders',null,array('class'=>'form-control','required'=>'required', 'data-is-number'))}}
        <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
    </div> --}}
    <div class="form-group col-md-6">
        {{Form::label('max_bank_accounts',__('Maximum Bank Account'))}}
        {{Form::text('max_bank_accounts',null,array('class'=>'form-control','required'=>'required', 'data-is-number'))}}
        <span class="small">{{__('Note: "-1" for Unlimited')}}</span>
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('image', __('Image')) }}
        {{ Form::file('image', array('class' => 'form-control')) }}
        <span class="small">{{__('Please upload a valid image file. Size of image should not be more than 2MB.')}}</span>
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('description', __('Description')) }}
        {!! Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']) !!}
    </div>
    <div class="form-group col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}

