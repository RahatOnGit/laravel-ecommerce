@if(session('message'))
<h6 class="alert alert-success" style="width: 200px; ">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{ session('message')}}
</h6>
@endif