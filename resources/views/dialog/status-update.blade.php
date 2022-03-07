<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">{{ __('Are You Sure?') }}</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <p>{{__('Mark this request as :status', ['status' => $status])}}</p>
                <form action="{{ $url }}" method="post" id='confirm-status-modal'>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $status }}">
                </form>
            </div>
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-secondary dialog-yes">{{ __('Yes') }}</button>
                <button type="button" class="btn btn-primary dialog-no">{{ __('No') }}</button>
            </div>
        </div>
    </div>
</div>
