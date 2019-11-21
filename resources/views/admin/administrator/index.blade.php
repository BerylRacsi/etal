@extends('admin.master')

@section('content')

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-success float-right btn-sm" href="{{ url('/admin/manage/create') }}"><i class="fa fa-plus-circle"></i> Add New User</a>
            <i class="fas fa-user"></i>
            User Accounts List</div>
          <div class="card-body">

              @php
                $no = 0;
              @endphp
            
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Signed Up At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Signed Up At</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>

                  @foreach($users as $user)
                  
                  <tr>
                    <td>{{$no += 1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    @foreach($user->roles as $role)
                      @if($role->pivot->role_id == 1)
                        Administrator
                      @else
                        Contributor
                      @endif
                    @endforeach
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>
                      <a class="btn btn-primary btn-sm btn-block" href="/admin/manage/{{$user->id}}/edit">Edit</a>
                      <br>
                      <form action="{{action('AdministratorController@destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-sm btn-block btn-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                  
                  
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>  

        
@endsection