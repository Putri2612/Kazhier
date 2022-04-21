@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service Unit')}}
@endsection
@push('script-page')
    <script>
        try {
            const pagination = new Pagination({
                locale: '{{ config('app.locale') }}',
                pageContainer: '#pagination-container',
                limitContainer: '#pagination-limit',
                navigation: {
                    previous: `<i class="fa-solid fa-chevron-left"></i>`,
                    next: `<i class="fa-solid fa-chevron-right"></i>`,
                    limit: '{{ __('Entries each page') }}'
                }
            });
            pagination.format = data => {
                @can('edit constant unit')
                    let editURL = "{{ route('product-unit.edit', [':id']) }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete constant unit')
                    let deleteURL = "{{ route('product-unit.destroy', [':id']) }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        @if(Gate::check('edit constant unit') || Gate::check('delete constant unit'))
                            <td class="action text-end">
                                @can('edit constant unit')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__("Edit Product Unit")}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete constant unit')
                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="${deleteURL}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        @endif
                    </tr>
                `;
            }
            pagination.init();
        } catch (error) {
            console.log(error);
            toastrs('Error', error, 'error');
        }
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Product & Service Unit')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Product & Service Unit')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-12 col-md-6">{{__('Manage Product & Service Unit')}}</h4>
                        @can('create constant unit')
                            <div class="col-12 col-md-6 row justify-content-end text-end">
                                <div class="col-auto">
                                    <a href="#" data-url="{{ route('product-unit.create') }}" data-ajax-popup="true" data-title="{{__('Create New Unit')}}" class="btn btn-icon icon-left btn-primary">
                                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                        <span class="btn-inner--text d-none d-md-inline"> {{__('Create')}}</span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div id="pagination-limit" class="col-auto"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('product-unit.get') }}">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Unit')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pagination-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
