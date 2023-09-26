<table class="table table-dark mt-2" id="tbl-produk">
    <thead>            
        <th scope="col">No</th>
        <th scope="col">Kode Pelanggan</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">No Telp</th>
        <th scope="col">Email</th>
        <th scope="col">Tools</th>
    </thead>
  <tbody>
        @foreach($pelanggan as $gan)
 <tr >
   <th>{{$i = (!isset($i)?$i=1:++$i) }}</th>
   <td>{{$gan->kode_pelanggan}}</td>
   <td>{{$gan->nama}}</td>
   <td>{{$gan->alamat}}</td>
   <td>{{$gan->no_telp}}</td>
   <td>{{$gan->email}}</td>
   
   <td><button type="button" class="btn btn-success"
    data-toggle="modal" 
    data-target="#modalFormPelanggan"
    data-mode="edit" data-id="{{$gan->id}}"
    data-kode_pelanggan="{{$gan->kode_pelanggan}}"
    data-nama="{{$gan->nama}}"
    data-alamat="{{$gan->alamat}}"
    data-no_telp="{{$gan->no_telp}}"
    data-email="{{$gan->email}}"
    ><i class="fas fa-edit"></i></button>
                      
  <form method="post" action="{{route('pelanggan.destroy',$gan->id)}}" style="display: inline;">
   @csrf
   @method('DELETE')
  <button type="submit"  class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td></form>
   </tr>   
     @endforeach
  </tbody>
</table>