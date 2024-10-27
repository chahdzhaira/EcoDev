@if (session($type))
<div class="d-flex justify-content-between align-items-center">
    <div class="bs-component w-100">
        <div class="alert alert-dismissible alert-{{ $class }}">
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
            <strong>Well Done !</strong> {{ session($type) }}
        </div>
    </div>
</div>
@endif
