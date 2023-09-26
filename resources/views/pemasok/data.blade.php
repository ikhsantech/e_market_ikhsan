<table class="table table-dark mt-2" id="tbl-produk">
    <thead>            
        <th scope="col">No</th>
        <th scope="col">Nama Pemasok</th>
        <th scope="col">Tools</th>
    </thead>
  <tbody>
        @foreach($pemasok as $sok)
 <tr >
   <th>{{$i = (!isset($i)?$i=1:++$i) }}</th>
   <td>{{$sok->nama_pemasok}}</td>
   
   <td><button type="button" class="btn btn-success"
    data-toggle="modal" 
    data-target="#modalFormPemasok"
    data-mode="edit" data-id="{{$sok->id}}"
    data-nama_pemasok="{{$sok->nama_pemasok}}"><i class="fas fa-edit"></i></button>
                      
  <form method="post" action="{{route('pemasok.destroy',$sok->id)}}" style="display: inline;">
   @csrf
   @method('DELETE')
  <button type="submit"  class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td></form>
   </tr>   
     @endforeach
  </tbody>
</table>