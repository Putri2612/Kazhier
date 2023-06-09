<div class="custmer-detail-wrap">
    <div class="row">
        <div class="col">
            <h4>{{__('Vendor Details')}}</h4>
        </div>
        <div class="col text-end ">
            @can('edit vender')
                <a href="#!" class="btn btn-primary btn-action me-1" data-size="2xl" data-url="{{ route('vender.edit',$vender['id']) }}" data-ajax-popup="true" data-title="{{__('Edit Vendor')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            @endcan
            @can('delete vender')
            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('vender.destroy', $vender['id']) }}">
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
                <span>{{AUth::user()->venderNumberFormat($vender['vender_id'])}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Name')}}</strong>
                <span>{{$vender['name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Email')}}</strong>
                <span>{{$vender['email']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$vender['contact']}}</span>
            </div>
        </div>

    </div>
    <h4 class="sub-title">{{__('BIlling Address')}}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Name')}}</strong>
                <span>{{$vender['billing_name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$vender['billing_phone']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Country')}}</strong>
                <span>{{$vender['billing_country']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('State')}}</strong>
                <span>{{$vender['billing_state']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('City')}}</strong>
                <span>{{$vender['billing_city']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Address')}}</strong>
                <span>{{$vender['billing_address']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Zip Code')}}</strong>
                <span>{{$vender['billing_zip']}}</span>
            </div>
        </div>
    </div>
    <h4 class="sub-title">{{__('Shipping Address')}}</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Name')}}</strong>
                <span>{{$vender['shipping_name']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Phone')}}</strong>
                <span>{{$vender['shipping_phone']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Country')}}</strong>
                <span>{{$vender['shipping_country']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('State')}}</strong>
                <span>{{$vender['shipping_state']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('City')}}</strong>
                <span>{{$vender['shipping_city']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Address')}}</strong>
                <span>{{$vender['shipping_address']}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info">
                <strong>{{__('Zip Code')}}</strong>
                <span>{{$vender['shipping_zip']}}</span>
            </div>
        </div>
    </div>
</div>
<script>
    common_bind_confirmation();
</script>
