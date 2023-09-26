

@extends('templates.layout')
  @push('style')
  @endpush
  @section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Barang</h3>

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

<div class="mt-3">
  @include('barang.data')
</div>

    
  <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalFormBarang">
 tambah Barang
</button>
  </div>

  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@include('barang.form')
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

$('#modalFormBarang').on('show.bs.modal',function(e){
  const btn =$(e.relatedTarget)
  console.log(btn.data('mode'))
  const mode = btn.data('mode')
  const kode_barang=btn.data('kode_barang')
  const produks_id=btn.data('produks_id')
  const nama_barang=btn.data('nama_barang')
  const satuan=btn.data('satuan')
  const harga_jual=btn.data('harga_jual')
  const stok=btn.data('stok')
  const ditarik=btn.data('ditarik')
  const user_id=btn.data('user_id')
  const id= btn.data('id')
  const modal=$(this)
  if(mode=='edit'){
    modal.find('.modal-title').text('Edit Data Barang')
modal.find('#kode_barang').val(kode_barang)
modal.find('#produks_id').val(produks_id)
modal.find('#nama_barang').val(nama_barang)
modal.find('#satuan').val(satuan)
modal.find('#harga_jual').val(harga_jual)
modal.find('#stok').val(stok)
modal.find('#ditarik').val(ditarik)
modal.find('#user_id').val(user_id)
modal.find('.modal-body form').attr('action','{{url("barang")}}/'+id)
modal.find('#method').html('@method("PATCH")')
  }else{
    modal.find('.modal-title').text('Input Data barang')
    modal.find('#kode_barang').val('')
modal.find('#method').html('')
modal.find('.modal-body form').attr('action', '{{url("barang")}}')
  }
});
</script>

@endpush