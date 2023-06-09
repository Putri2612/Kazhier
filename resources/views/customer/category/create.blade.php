{{Form::open(array('route'=>'customer-category.store','method'=>'post', 'onsubmit' => 'return ValidateForm(event)'))}}
<div class="row">
    <div class="form-group col-6">
        {{Form::label('name',__('Name'),array('class'=>'')) }}
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('discount_type',__('Discount type'))}}
            {{Form::select('discount_type',$types, null,array('class'=>'form-control font-style selectric','required'=>'required'))}}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('discount',__('Discount'))}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text discount-unit">
                        %
                    </div>
                </div>
                {{Form::text('discount',null,array('class'=>'form-control', 'data-is-number', 'data-is-required'))}}
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('max_discount',__('Maximum discount'))}}
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text discount-unit">
                        {{ Auth::user()->currencySymbol() }}
                    </div>
                </div>
                {{Form::text('max_discount',null,array('class'=>'form-control', 'data-is-number', 'data-is-required'))}}
                <span class="text-mute">{{ __('Set the value to 0 if there is no discount limit') }}</span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-end">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
    {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
</div>

{{Form::close()}}


