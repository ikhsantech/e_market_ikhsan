<table class="table table-dark mt-2" id="tbl-produk">
  <t   head>            
        <th scope="col">No</th>
        <th scope="col">Kode Barang</th>
      <th scope="col">Produk Id</th>
      <th scope="col">Nama Barang</th>
        <th scope="col">Satuan</th>
       <th scope="col">Harga Jual</th>
      <th scope="col">Stock</th>
        <th scope="col">Ditarik</th>
      <th scope="col">User Id</th>
       <th scope="col">Tools</th>
      </thead>
  <tbody>
        @foreach($barang as $b)
 <tr >
<th>{{$i = (!isset($i)?$i=1:++$i) }}</th>
   <td>{{$b->kode_barang}}</td>
   <td>{{$b->produks_id}}</td>
   <td>{{$b->nama_barang}}</td>
   <td>{{$b->satuan}}</td>
   <td>{{$b->harga_jual}}</td>
   <td>{{$b->stok}}</td>
   <td>{{$b->ditarik}}</td>
   <td>{{$b->user_id}}</td>
   <td><button type="button" class="btn btn-success"
    data-toggle="modal" 
    data-target="#modalFormBarang"
    data-mode="edit" data-id="{{$b->id}}"
    data-kode_barang="{{$b->kode_barang}}"
    data-produks_id="{{$b->produks_id}}"
    data-nama_barang="{{$b->nama_barang}}"
    data-satuan="{{$b->satuan}}"
    data-harga_jual="{{$b->harga_jual}}"
    data-stok="{{$b->stok}}"
    data-ditarik="{{$b->ditarik}}"
    data-user_id="{{$b->user_id}}"><i class="fas fa-edit"></i></button>
                      
  <form method="post" action="{{route('barang.destroy',$b->id)}}" style="display: inline;">
   @csrf
   @method('DELETE')
  <button type="submit"  class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td></form>
   </tr>   
   
  
 
  

       @endforeach
  </tbody>
</table>