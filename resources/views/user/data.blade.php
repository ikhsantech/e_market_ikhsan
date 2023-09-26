<table class="table table-dark mt-2" id="tbl-produk">
     <thead>                  
        <th scope="col">No</th>
        <th scope="col">Nama User</th>
         <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Tools</th>
     </thead>
  <tbody>
        @foreach($user as $us)
 <tr>
   <th>{{$i = (!isset($i)?$i=1:++$i) }}</th>
          <td>{{$us->name}}</td>
             <td>{{$us->email}}</td>
              <td>{{$us->password}}</td>


   <td><button type="button" class="btn btn-success"
    data-toggle="modal" 
    data-target="#modalFormUser"
    data-mode="edit" data-id="{{$us->id}}"
    data-name="{{$us->name}}"
    data-email="{{$us->email}}"
    data-password="{{$us->password}}"
    ><i class="fas fa-edit"></i></button>
                      
  <form method="post" action="{{route('user.destroy',$us->id)}}" style="display: inline;">
   @csrf
   @method('DELETE')
  <button type="submit"  class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td></form>
</tr>
     @endforeach         
 </tbody>
</table>