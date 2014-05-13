
{{ Form::open(array('url'=>'users/update/'.$user[0]->id, 'class'=>'form-signup', 'method' => 'POST')) }}
        <h1>Update User</h1>
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
	{{ Form::hidden('id', $user[0]->id) }}
    {{ Form::text('firstname', $user[0]->firstname, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
    {{ Form::text('lastname', $user[0]->lastname, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', $user[0]->email, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
    {{ Form::submit('Update', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
