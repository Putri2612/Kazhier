<div class="custmer-detail-wrap">
    <div class="row">
        <div class="col">
            <h4>{{__('Customer Details')}}</h4>
        </div>
        <div class="col text-end ">
            @can('edit customer')
                <a href="#!" class="btn btn-primary btn-action me-1" data-size="2xl" data-url="{{ route('customer.edit',$customer['id']) }}" data-ajax-popup="true" data-title="{{__('Edit Customer')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            @endcan
            @can('delete customer')
                <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('customer.destroy', $customer['id']) }}">
                    <i class="fas fa-trash"></i>
                </a>
            @endcan

        </div>
    </div>
    <h4 class="sub-title">{{__('Basic Info')}}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Customer Id')}}</strong>
                <span>{{AUth::user()->customerNumberFormat($customer['customer_id'])}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info font-style">
                <strong>{{__('Name')}}</strong>
                <span>{{$customer['name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Email')}}</strong>
                <span>{{$customer['email']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$customer['contact']}}</span>
            </div>
        </div>

    </div>
    <h4 class="sub-title">{{__('BIlling Address')}}</h4>
    <div class="row font-style">
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Name')}}</strong>
                <span>{{$customer['billing_name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$customer['billing_phone']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Country')}}</strong>
                <span>{{$customer['billing_country']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('State')}}</strong>
                <span>{{$customer['billing_state']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('City')}}</strong>
                <span>{{$customer['billing_city']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Address')}}</strong>
                <span>{{$customer['billing_address']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Zip Code')}}</strong>
                <span>{{$customer['billing_zip']}}</span>
            </div>
        </div>
    </div>
    <h4 class="sub-title">{{__('Shipping Address')}}</h4>
    <div class="row font-style">
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Name')}}</strong>
                <span>{{$customer['shipping_name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$customer['shipping_phone']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Country')}}</strong>
                <span>{{$customer['shipping_country']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('State')}}</strong>
                <span>{{$customer['shipping_state']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('City')}}</strong>
                <span>{{$customer['shipping_city']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Address')}}</strong>
                <span>{{$customer['shipping_address']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Zip Code')}}</strong>
                <span>{{$customer['shipping_zip']}}</span>
            </div>
        </div>
    </div>
</div>
<script>
    common_bind_confirmation();
</script>
