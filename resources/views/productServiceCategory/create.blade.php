{{ Form::open(array('url' => 'product-category', 'autocomplete' => 'off')) }}
<div class="row">
    <div class="form-group  col-md-12">
        <div class="input-group">
            {{ Form::label('type', __('Category Type')) }}
            {{ Form::select('type',$types,null, array('class' => 'form-control customer-sel font-style selectric ','required'=>'required')) }}
        </div>
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Category Name')) }}
        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('color', __('Category Color')) }}
        {{ Form::text('color', '', array('class' => 'form-control jscolor','required'=>'required')) }}
        <p class="small">{{__('For chart representation')}}</p>
    </div>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
<script>
    if(typeof suggestions === 'undefined'){
        let suggestions   = new Suggestion.CreateList('input[name="name"]', @json($products));
        let selector      = document.querySelector('[name="type"]');
        const changeSuggest = value => {
            let url = `{{ route('product-category.suggestion') }}?type=${value}`;
            console.log(url);
            fetch(url, {
                method: 'get',
                headers: {
                    'X-Requested-With'  : 'XMLHttpRequest',
                    'X-CSRF-TOKEN'      : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'same-origin',
            }).then(response => {
                if( response.ok ) return response.json();
                else throw new Error(response.code);
            }).then(data => {
                if( data.error ) throw new Error(data.message);
                else {
                    console.log(data, suggestions);
                    suggestions.refreshData(data.data)
                };
            }).catch(error => {
                toastrs('Error', error, 'error');
            })
        }
        $(selector).on('change', event => {
            let value = event.target.value;
            changeSuggest(value);
        });
    } else {
        suggestions   = new Suggestion.CreateList('input[name="name"]', @json($products));
        selector      = document.querySelector('[name="type"]');
        $(selector).on('change', event => {
            let value = event.currentTarget.value;
            changeSuggest(value);
        });
    }
</script>
{{ Form::close() }}

