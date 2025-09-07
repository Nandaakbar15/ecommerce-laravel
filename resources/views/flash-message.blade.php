@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($message = Session::get('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
