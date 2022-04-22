@extends('layouts.admin')
@section('page-title')
    {{__($displayType . " Category")}}
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
                @can('edit constant category')
                    let editURL = "{{ route('category.edit', ['type' => $type, 'category' => ':id']) }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete constant category')
                    let deleteURL = "{{ route('category.destroy', ['type' => $type, 'category' => ':id']) }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        @if(Gate::check('edit constant category') || Gate::check('delete constant category'))
                            <td class="action text-end">
                                @can('edit constant category')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__("Edit {$displayType} Category")}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete constant category')
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
            <h1>{{__($displayType . " Category")}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__($displayType . " Category")}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between w-100 mb-3 crd">
                        <h4 class="fw-normal">{{__('Manage Categories')}}</h4>
                        @can('create constant category')
                            <div class="col-auto text-end">
                                <a href="#" data-url="{{ route('category.create', $type) }}" data-ajax-popup="true" data-title="{{__("Create New {$displayType} Category")}}" class="btn btn-icon icon-left btn-primary">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text d-none d-md-inline"> {{__('Create')}}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div class="tab-content">
                                    <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div id="pagination-limit" class="col-auto"></div>
                                        </div>
                                        <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('category.get', $type) }}">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>{{__('Type')}}</th>
                                                            @if(Gate::check('edit constant category') || Gate::check('delete constant category'))
                                                                <th class="text-end">{{__('Action')}}</th>
                                                            @endif
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

        </div>
    </section>
@endsection
