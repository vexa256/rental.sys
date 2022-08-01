<div class="col-md-12 shadow-lg p-2">
    <div class="table-responsive">

     <table class="filtered_t table table-dark table-sm table-dark card-table table-vcenter  datatable">
      <thead>
       <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date Created</th>
        <th>Delete Account</th>

       </tr>
      </thead>
      <tbody>
       @isset($Admins) @foreach ($Admins as $data)

        <tr>

         <td>{{ $data->email }}</td>
         <td>{{ $data->name }}</td>
         <td>{{ $data->email }}</td>
         <td>{{ date('Y-M-d', strtotime($data->created_at)) }}</td>
            <td>

                <a href="{{ route('DeleteAdmins', ['id' => $data->id]) }}" class="btn btn-danger btn-sm ">
                    <i class="fas fa-trash me-2" aria-hidden="true"></i> Delete
                </a>

            </td>
        </tr>
       @endforeach
      @endisset

     </tbody>
    </table>

   </div>
   </div>



   </div>



   <div class="modal fade" id="CreateAdmin"  tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="staticBackdropLabel">Create New Admin Account</h5>
           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <form method="post" action="{{ route('CreateNewAdmin') }}" class="row">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text($name="name", $value=null, [

                            "class" => "form-control  mt-3 mb-3",
                            "placeholder" => "Full name",
                            "required" => "required"

                        ]) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::email($name="email", $value=null, [

                            "class" => "form-control  mt-3 mb-3",
                            "placeholder" => "Email/Username",
                            "required" => "required"

                        ]) !!}
                    </div>


                    <div class="col-md-12">
                        {!! Form::text($name="password", $value=null, [

                            "class" => "form-control mt-3 mb-3",
                            "placeholder" => "Password",
                            "required" => "required"

                        ]) !!}
                    </div>

                    <button type="submit" class="btn btn-danger btn-sm">
                        Save changes
                    </button>
                </div>

            </form>
         </div>

       </div>
     </div>
   </div>
