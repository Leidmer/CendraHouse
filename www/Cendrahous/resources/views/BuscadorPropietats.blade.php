@extends('admin.master')

@section('title', 'Buscador de Propietats')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/properties') }}"><i class="fas fa-building"></i> Propietats</a>
</li>
@endsection

@section('content')

 <body>
  <br />
  <div class="mtop16" style="margin-left: 16px; margin-right: 16px; padding: 16px;">
   <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body" style="margin: 16px;">
     <div class="form-group">
       <br>
      <input type="text" name="search" id="search" class="form-control" placeholder="Introdueix una dada de la propietat que vols trobar" />
     </div>
     <div class="table-responsive">
      <h3 style="text-align: center;">Número de resultats: <span id="total_records"></span></h3>
      <br>
      <table class="table table-striped">
       <thead>
        <tr>
         <th>ID</th>
         <th>Nom de la Propietat</th>
         <th>Slug</th>
         <th>Número d'habitacions</th>
         <th>Número de banys</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
</div>
 </body>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('BuscadorPropietats.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

@endsection