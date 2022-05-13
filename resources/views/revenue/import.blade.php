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
<div class="wizard-form collapse">
    <div class="text-center pt-4 pb-5">
        <h3 class="display-4">{{ __('Extracting') }} <span id="load-extract" data-dot="3">...</span></h3>
    </div>
</div>
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
                if(FormWizard.active == FormWizard.elements.length - 1) {
                    FormWizard.progress = 100;
                } else {
                    FormWizard.progress += (100 / FormWizard.elements.length);
                }
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
        FormWizard.callback.switchForm();
        const loading = document.querySelector('#load-extract'),
            animation = setInterval(() => {
                let dots = parseInt(loading.getAttribute('data-dot')),
                    string = '';
                if(dots == 3) dots = 1;
                else dots++;
                for(let dot = 0; dot < dots; dot++) {
                    string += '.';
                }
                loading.setAttribute('data-dot', dots);
                loading.innerHTML = string;
            }, 500),
            client  = new XMLHttpRequest(),
            data    = new FormData(),
            token   = document.querySelector("meta[name='csrf-token']").getAttribute('content');

        data.append('headings', response.headings);
        data.append('path', response.path);
        data.append('_method', 'PUT');

        client.onprogress = (progress) => {
            if(progress.lengthComputable) {
                FormWizard.progress += (100 / FormWizard.elements.length) * (progress.loaded / progress.total);
                FormWizard.bar.style.width = `${FormWizard.progress}%`;
                FormWizard.bar.setAttribute('aria-valuenow', FormWizard.progress);
            }
        }

        client.onreadystatechange = () => {
            if(client.readyState == 4) {
                const icon  = FormWizard.elements[2].querySelector('i'),
                    text    = FormWizard.elements[2].querySelector('p');
                let next = false,
                    success = false;
                console.log(client.status, client.responseText);
                if(client.status == 200) {
                    const response = JSON.parse(client.responseText);
                    success = true;
                    if('failed' in response) {
                        icon.classList.remove('fa-circle-check', 'text-success');
                        icon.classList.add('fa-circle-exclamation', 'text-warning');

                        text.classList.add('text-start');
                        text.innerHTML = response.failed;
                        success = false;
                    }
                    next = true;
                } else if(client.status == 400) {
                    const response= JSON.parse(client.responseText);
                    
                    icon.classList.remove('fa-circle-check', 'text-success');
                    icon.classList.add('fa-circle-xmark', 'text-danger');
                    text.classList.add('text-start');

                    text.innerHTML = `${response.empty} {{ __('cannot be found') }}. {{ __('Please refer to sample we provide') }}.`;

                    next = true;
                } else {
                    icon.classList.remove('fa-circle-check', 'text-success');
                    icon.classList.add('fa-circle-xmark', 'text-danger');

                    text.classList.add('text-start');
                    text.innerHTML = client.responseText;

                    next = true;
                }

                if(next) {
                    setTimeout(() => {
                        clearInterval(animation);
                        FormWizard.callback.switchForm();
                        if(success){
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }, 1500);
                }
            }
        };

        client.open('POST', '{{ route('revenue.import.store') }}');
        client.setRequestHeader('X-CSRF-TOKEN', token);
        client.send(data);
    });
    dropzones.import.on('error', (file, message) => {
        toastrs('Error', message, 'error');
    });
</script>