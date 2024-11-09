@extends('layouts.app')

@section('title', 'News')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">News</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-card>
            <x-slot name="header">
                @if (auth()->user()->hasRole('admin'))
                <button onclick="addForm(`{{ route('news.store') }}`)" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add News</button>
                @else
                <a href="{{ url('/news') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add News</a>
                @endif
            </x-slot>

            <x-table>
                <x-slot name="thead">
                    <th width="5%">No</th>
                    <th width="20%">Title</th>
                    <th>Description</th>
                    <th>Publish Date</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th width="15%"><i class="fas fa-cog"></i></th>
                </x-slot>
            </x-table>
        </x-card>
    </div>
</div>

@includeIf('news.form')
@endsection

<x-toast />
@includeIf('includes.datatable')
@includeIf('includes.select2')
@includeIf('includes.summernote')
@includeIf('includes.datepicker')

@push('scripts')
<script>
    let modal = '#modal-form';
    let table;

    table = $('.table').DataTable({
        processing: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('news.data') }}',
            data: function (d) {
                d.status = $('[name=status2]').val();
                d.start_date = $('[name=start_date2]').val();
                d.end_date = $('[name=end_date2]').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'title'},
            {data: 'short_description'},
            {data: 'publish_date', searchable: false},
            {data: 'status', searchable: false, sortable: false},
            {data: 'author', searchable: false},
            {data: 'action', searchable: false, sortable: false},
        ]
    });

    $('[name=status2]').on('change', function () {
        table.ajax.reload();
    });

    $('.datepicker').on('change.datetimepicker', function () {
        table.ajax.reload();
    });

    function addForm(url, title = 'Add News') {
        $(modal).modal('show');
        $(`${modal} .modal-title`).text(title);
        $(`${modal} form`).attr('action', url);
        $(`${modal} [name=_method]`).val('post');

        resetForm(`${modal} form`);
    }

    function editForm(url, title = 'Edit News') {
        $.get(url)
            .done(response => {
                $(modal).modal('show');
                $(`${modal} .modal-title`).text(title);
                $(`${modal} form`).attr('action', url);
                $(`${modal} [name=_method]`).val('put');

                resetForm(`${modal} form`);
                loopForm(response.data);
            })
            .fail(errors => {
                alert('Cannot display data');
                return;
            });
    }

    function submitForm(originalForm) {
        $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
            .done(response => {
                $(modal).modal('hide');
                showAlert(response.message, 'success');
                table.ajax.reload();
            })
            .fail(errors => {
                if (errors.status == 422) {
                    loopErrors(errors.responseJSON.errors);
                    return;
                }

                showAlert(errors.responseJSON.message, 'danger');
            });
    }

    function deleteData(url) {
        if (confirm('Are you sure you want to delete this data?')) {
            $.post(url, {
                    '_method': 'delete'
                })
                .done(response => {
                    showAlert(response.message, 'success');
                    table.ajax.reload();
                })
                .fail(errors => {
                    showAlert('Cannot delete data');
                    return;
                });
        }
    }
</script>
@endpush
