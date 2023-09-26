
@extends('templates.layout')
  @push('style')
  @endpush
  @section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Pemasok</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
 {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    @endif
        @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-errors">
        <ul>
@foreach($errors->all() as $errors)
<li>{{$errors}}</li>
@endforeach
</ul>
  <button type ="button" class ="close" data-dismiss ="alert" aria-label ="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
    @endif
    
      <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#modalFormPemasok">
 tambah Pemasok
</button>

 <a href="{{route('pdfpemasok')}}" class="btn btn-danger mt-1"  >
 PDF
</a>


@include('pemasok.data')



  </div>

  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('pemasok.form')
</section>
@endsection
@push('script')
<script> 

$('#alert-errors').fadeTo(200,500).slideUp(500,function(){
 $('#alert-errors')
});

$('#alert-success').fadeTo(200,500).slideUp(500,function(){
 $('#alert-success')
});

$(function(){
  $('.#tbl-produk.').DataTable()
});

$('.btn-delete').on('click',function(e){
 e.preventDefault()
let data = $(this).closest('tr').find('td:eq(0)').text();
Swal.fire({
  icon:'error',
  title:'Hapus data',
  html:'apakah data <span>${data}</span> akan dihapus?',
  confirmButtonText:'Ya',
  denyButtonText:'Tidak',
  showDenyButton:true,
  focusConfirm:false
}).then((result)=>{
  if(result.isConfirmed) $(e.target).closest('form').submit()
  else Swal.close()
})
});

$('#modalFormPemasok').on('show.bs.modal',function(e){
  const btn =$(e.relatedTarget)
  console.log(btn.data('mode'))
  const mode = btn.data('mode')
  const nama_pemasok=btn.data('nama_pemasok')
  const id= btn.data('id')
  const modal=$(this)
  if(mode=='edit'){
    modal.find('.modal-title').text('Edit Data Pemasok')
modal.find('#nama_pemasok').val(nama_pemasok)
modal.find('.modal-body form').attr('action','{{url("pemasok")}}/'+id)
modal.find('#method').html('@method("PATCH")')
  }else{
    modal.find('.modal-title').text('Input Data Pemasok')
    modal.find('#nama_pemasok').val('')
modal.find('#method').html('')
modal.find('.modal-body form').attr('action', '{{url("pemasok")}}')
  }
});
</script>

@endpush