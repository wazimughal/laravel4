<h1>Dashboard</h1>
<table width="100%" class="table table-striped table-bordered table-condensed table-hover table-responsive">
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
	<th>Created at</th>
    <th>Action</th>
  </tr>

  @foreach($users as $user)
  <tr>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td><a href="{{ URL::to('users/edit/'.$user->id ) }}">Edit</a> | <a href="{{ URL::to('users/delete/'.$user->id ) }}">Delete</a> | 
          
        <a href="{{ URL::to('users/toggleuser/'.$user->id .'/'.$user->is_active ) }}">{{($user->is_active==1)?'inActive':'Active'}}</a>
        </td>
  </tr>
  @endforeach
</table>

