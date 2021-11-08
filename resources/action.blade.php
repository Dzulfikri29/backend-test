<div class="btn-group">
    <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ft-more-horizontal"></i>
    </button>
    <div class="dropdown-menu">
        @if ($can_edit)
            <a class="dropdown-item" href="{{ $edit }}">Edit</a>
        @endif
        @if ($can_delete)
            <a class="dropdown-item" href=""
                onclick="event.preventDefault(); showDeleteConfirm({{ $customer->id }})">Hapus</a>
            <form id="delete-form{{ $customer->id }}" action="{{ $delete }}" method="POST" class="d-none">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
            </form>
        @endif
    </div>
</div>
