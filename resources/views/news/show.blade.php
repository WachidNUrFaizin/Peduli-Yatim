@extends('layouts.app')

@section('title', 'News')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@push('css')
<style>
    .daftar-donasi.nav-pills .nav-link.active,
    .daftar-donasi.nav-pills .show>.nav-link {
        background: transparent;
        color: var(--dark);
        border-bottom: 3px solid var(--blue);
        border-radius: 0;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-lg-8">
        <x-card>
            <x-slot name="header">
                <h3>{{ $news->title }}</h3>
                <p class="font-weight-bold mb-0">
                    Posted by <span class="text-primary">{{ $news->user->name }}</span>
                    <small class="d-block">{{ tanggal_indonesia($news->publish_date) }} {{ date('H:i', strtotime($news->publish_date)) }}</small>
                </p>
            </x-slot>

            {!! $news->body !!}

            @if ($news->status == 'pending' && auth()->user()->hasRole('admin'))
            <x-slot name="footer">
                <button class="btn btn-success float-right"
                    onclick="editForm('{{ route('news.update_status', $news->id) }}', 'publish', 'Are you sure you want to confirm the selected news?', 'success')">Confirm</button>
            </x-slot>
            @elseif($news->status == 'publish' && auth()->user()->hasRole('admin'))
            <x-slot name="footer">
                <button class="btn btn-danger"
                    onclick="editForm('{{ route('news.update_status', $news->id) }}', 'archived', 'Are you sure you want to archive the selected news?', 'danger')">Archive</button>
            </x-slot>
            @elseif ($news->status == 'archived' && auth()->user()->hasRole('admin'))
            <x-slot name="footer">
                <button class="btn btn-success float-right"
                    onclick="editForm('{{ route('news.update_status', $news->id) }}', 'publish', 'Are you sure you want to unarchive the selected news?', 'success')">Unarchive</button>
            </x-slot>
            @endif
        </x-card>
    </div>
    <div class="col-lg-4">
        <x-card>
            <x-slot name="header">
                <h5 class="card-title">Category</h5>
            </x-slot>

            <ul>
                @foreach ($news->category_news as $item)
                <li>{{ $item->name }}</li>
                @endforeach
            </ul>
        </x-card>

        <x-card>
            <x-slot name="header">
                <h5 class="card-title">Featured Image</h5>
            </x-slot>

            <img src="{{ Storage::disk('public')->url($news->path_image) }}" class="img-thumbnail">
        </x-card>
    </div>
</div>

<x-modal size="modal-md">
    <x-slot name="title">
        Confirm
    </x-slot>

    @method('put')

    <input type="hidden" name="status" value="publish">

    <div class="alert mt-3">
        <i class="fas fa-info-circle mr-1"></i> <span class="text-message"></span>
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="submitForm(this.form)">Save</button>
    </x-slot>
</x-modal>
@endsection

@push('scripts')
<script>
    let modal = '#modal-form';

    function editForm(url, status, message, color) {
        $(modal).modal('show');
        $(`${modal} form`).attr('action', url);

        $(`${modal} [name=status]`).val(status);
        $(`${modal} .text-message`).text(message);
        $(`${modal} .alert`).removeClass('alert-success alert-danger').addClass(`alert-${color}`)
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
                $('.card-footer').remove();
            })
            .fail(errors => {
                if (errors.status == 422) {
                    loopErrors(errors.responseJSON.errors);
                    return;
                }

                showAlert(errors.responseJSON.message, 'danger');
            });
    }
</script>
@endpush
