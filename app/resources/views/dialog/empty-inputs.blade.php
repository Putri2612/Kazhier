<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">{{ __($title) }}</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <p>{{ __('The following inputs are empty, continue anyway?') }}</p>
                <ul>
                    @foreach ($names as $name)
                        <li>{{ __(ucfirst($name)) }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-secondary dialog-yes">{{ __('Yes') }}</button>
                <button type="button" class="btn btn-primary dialog-no">{{ __('No') }}</button>
            </div>
        </div>
    </div>
</div>
