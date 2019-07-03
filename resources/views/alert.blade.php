@if(Session::has('success') || Session::has('warning'))
<div class="col-md-12 text-center">
  <div
    class="alert @if(Session::has('success')){{ 'alert-primary' }} @else {{ 'alert-warning' }} @endif alert-dismissible fade show"
    role="alert">
    @if(Session::has('success'))
    {{ Session::get('success') }}
    @endif
    @if(Session::has('warning'))
    {{ Session::get('warning') }}
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif