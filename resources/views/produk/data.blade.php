<table class="table table-dark mt-2" id="tbl-produk">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">action</th>
 
    </tr>
  </thead>
  <tbody>
    @foreach($produk as $prod)
    <tr>
      <th>{{$i = (!isset($i)?$i=1:++$i) }}</th>
      <td>{{$prod->nama_produk}}</td>
      <td><button type="button" class="btn btn-success"
      data-toggle="modal" 
      data-target="#modalFormProduk"
      data-mode="edit" data-id="{{$prod->id}}"
      data-nama_produk="{{$prod->nama_produk}}"><i class="fas fa-edit"></i></button>

      <form method="post" action="{{route('produk.destroy',$prod->id)}}" style="display: inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td></form>
    </tr>
    @endforeach
  </tbody>
</table>
