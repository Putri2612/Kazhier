<div class="progress wizard-progress mb-3">
    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="wizard-form collapse mb-3">
    <div class="d-grid gap-2 mb-3">
        <a href="{{ route('samples.import', 'revenue') }}" class="btn btn-primary btn-icon icon-left">
            <span class="btn-inner--icon"><i class="fas fa-download"></i></span>
            <span class="btn-inner--text"> {{__('Sample')}}</span>
        </a>
    </div>
    {{ Form::open(['route' => 'revenue.import.headings', 'class' => 'dropzone import-dropzone', 'enctype' => 'multipart/form-data']) }}
    {{ Form::close() }}
</div>
{{ Form::open(['method' => 'PUT', 'route' => 'revenue.import.store', 'class' => 'wizard-form collapse pt-3']) }}
    <p class="h4">{{ __('Please select the appropriate column names') }}</p>
    {{ Form::hidden('path', '') }}
    <div class="row">
        <div class="col-md-12 pb-2">
            {{ Form::label('date', __('Date')) }}
            {{ Form::select('date', ['' => '---'], null, ['class' => 'form-control selectric second-form','required'=>'required']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('amount', __('Amount')) }}
            {{ Form::select('amount', ['' => '---'], null, ['class' => 'form-control selectric second-form','required'=>'required']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('account', __('Account')) }}
            {{ Form::select('account', ['' => '---'], null, ['class' => 'form-control selectric second-form', 'data-is-required']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('category', __('Category')) }}
            {{ Form::select('category', ['' => '---'], null, ['class' => 'form-control selectric second-form', 'required'=>'required']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('payment_method', __('Payment method')) }}
            {{ Form::select('payment_method', ['' => '---'], null, ['class' => 'form-control selectric second-form','required'=>'required']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('customer', __('Customer')) }}
            {{ Form::select('customer', ['' => '---'], null, ['class' => 'form-control selectric second-form']) }}
        </div>
        <div class="col-md-6 pb-2">
            {{ Form::label('description', __('Description')) }}
            {{ Form::select('description', ['' => '---'], null, ['class' => 'form-control selectric second-form']) }}
        </div>
        <div class="col-md-12 py-3"></div>
        <div class="col-md-12 text-end">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
            {{Form::submit(__('Save'),array('class'=>'btn btn-primary'))}}
        </div>
    </div>
{{ Form::close() }}
<div class="wizard-form collapse">
    <div class="text-center pt-4 pb-5">
        <i class="fas fa-circle-check fa-9x text-success"></i>
        <p>{{ __('Data imported successfully') }}</p>
    </div>
</div>
<script>
    FormWizard.elements = Array.from(document.querySelectorAll('.wizard-form'));
    FormWizard.bar      = document.querySelector('.wizard-progress .progress-bar');
    FormWizard.active   = 0;
    FormWizard.collapse = [];
    FormWizard.progress = 0;
    FormWizard.callback = {
        switchForm : () => {
            FormWizard.collapse[FormWizard.active].hide();
            FormWizard.active++;
            setTimeout(() => {
                FormWizard.collapse[FormWizard.active].show();
                FormWizard.progress += (100 / FormWizard.elements.length);
                FormWizard.bar.style.width = `${FormWizard.progress}%`;
                FormWizard.bar.setAttribute('aria-valuenow', FormWizard.progress);
            }, 500);
        }
    };

    FormWizard.elements.forEach((elem, index) => {
        FormWizard.collapse.push(new bootstrap.Collapse(elem, {
            toggle: index == FormWizard.active
        }));
    })

    dropzones.import = new Dropzone('.import-dropzone', {
        acceptedFiles: '.xlsx, .csv, .xls',
        dictDefaultMessage: '{{ __('Drop files here to upload') }}',
    })
    dropzones.import.on('success', (file, response) => {
        document.querySelector('input[name="path"]').value = response.path;
        response.headings.forEach(heading => {
            document.querySelectorAll('.second-form').forEach(element => {
                const option = document.createElement('option');
                option.innerHTML = heading;
                if(heading == element.name) {
                    option.selected = true;
                }
                element.append(option);
            });
        });
        $('.second-form').selectric('refresh');
        FormWizard.callback.switchForm();
    });
    dropzones.import.on('error', (file, message) => {
        toastrs('Error', message, 'error');
    });

    FormWizard.elements[1].addEventListener('submit', event => {
        event.preventDefault();
        const form  = event.currentTarget,
            data    = new FormData(form);

        FormWizard.progress += (100 / FormWizard.elements.length);
        FormWizard.bar.style.width = `${FormWizard.progress}%`;
        FormWizard.bar.setAttribute('aria-valuenow', FormWizard.progress);
        fetch(form.action, {
            method: 'POST',
            body: data
        }).then(response => {
            if(response.ok) {
                return response.json()
            } else if(response.status != 500){
                toastrs('Error', `${response.status}: ${response.statusText}`, 'error');
                return response.text()
            } 
        }).then(data => {
            if(typeof data == 'string') {
                throw new Error(data);
            } else {
                FormWizard.callback.switchForm();
                if(data.hasOwnProperty('failed')) {
                    const indicator = document.querySelector('.success-indicator'),
                        message     = document.querySelector('.import-message');

                    message.innerHTML = "{{__('No data imported, make sure you selected the right columns.')}}";
                    indicator.classList.remove('fa-circle-check', 'text-success');
                    indicator.classList.add('fa-ban', 'text-danger');
                } else {
                    if(data.hasOwnProperty('fails')) {
                        FormWizard.elements[FormWizard.active].insertAdjacentHTML('beforeend', `<pre class="bg-warning px-3 py-2">${data.fails}</pre>`);
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                };
            }
        }).catch(error => {
            FormWizard.progress -= (100 / FormWizard.elements.length);
            FormWizard.bar.style.width = `${FormWizard.progress}%`;
            FormWizard.bar.setAttribute('aria-valuenow', FormWizard.progress);
        });
    });
</script>