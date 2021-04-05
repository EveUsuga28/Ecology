
<form action="{{url('/material')}}" method="post" enctype="multipart/form-data">
  @csrf

  @include('material.form')

</form>
