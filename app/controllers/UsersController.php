<?php
 
class UsersController extends BaseController {
	 protected $layout="layouts.main";
	
	 
	 public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
	$this->beforeFilter('auth', array('except'=>array('getLogin','postSignin','getRegister','postRegister' )));
	}

	 public function getIndex() {
    $this->layout->content = View::make('users.register');
	
		}
	 public function getRegister() {
    $this->layout->content = View::make('users.register');
	
		}

//		postUpdate  user
		 public function postUpdate($id) {
				$rules = array(
				'firstname'=>'required',
				'id'=>'required|Numeric|min:1',
				'lastname'=>'required|alpha|min:2',
				'email'=>'required|email'
				);
	
				$validator = Validator::make(Input::all(), $rules);
//				$messages = $validator->messages();
			
					if ($validator->passes()) {
					$user = User::find($id);
					$user->firstname = Input::get('firstname');
					$user->lastname = Input::get('lastname');
					$user->email = Input::get('email');
					$user->save();
					
					return Redirect::to('users/usersmanagement')->with('message', 'Succesfully updated !');
					} 
					else {
					return Redirect::to('users/edit/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
					}
		}
//		postCreate Register user
		 public function postRegister() {

				$validator = Validator::make(Input::all(), User::$rules);
					
					if ($validator->passes()) {
					$user = new User;
					$user->firstname = Input::get('firstname');
					$user->lastname = Input::get('lastname');
					$user->email = Input::get('email');
					$user->password = Hash::make(Input::get('password'));
					$user->save();
					
					return Redirect::to('users/login')->with('message', 'Thanks for registering!');
					} 
					else {
					return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
					}
		}
		
			public function getLogin() {
			$this->layout->content = View::make('users.login');
		}
		
		public function postSignin() {
						if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'),'is_active'=>1))) {
					return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
				} else {
					return Redirect::to('users/login')
						->with('message', 'Your username/password combination was incorrect')
						->withInput();
				}     
		}

		public function getDashboard() {
			
			// To change the layout template for admin
			$this->layout = View::make('layouts.admin');
			$this->layout->content = View::make('users.dashboard');
		}
		
		public function getUsersmanagement() {
			
			// To change the layout template for admin
			$this->layout = View::make('layouts.admin');
			$this->data['users'] = DB::table('users')->get();
			$this->layout->content = View::make('users.usersmanagement',$this->data);
		}
		public function getEdit($id) {
			// To change the layout template for admin
			$this->layout = View::make('layouts.admin');
			/* $user = User::find($id);
			 echo '<pre>';
			 print_r($user);
			 echo '</pre>';*/
			$this->data['user'] = DB::select('select * from users where id = ?', array($id));
		//print_r($this->data['user'] );
			$this->layout->content = View::make('users.editUser',$this->data);
		}

		public function getDelete($id) {
			// To change the layout template for admin
			$this->layout = View::make('layouts.admin');
			$this->data['user'] = DB::table('users')->where('id', '=', $id)->delete();
			return Redirect::to('users/usersmanagement')->with('message', 'User succesfully deleted!');
		}
		public function getToggleuser($id,$is_active) {
			
					$user = User::find($id);
					if($is_active==0)
					$user->is_active = 1;
					else
					$user->is_active = 0;
					$user->save();
			// To change the layout template for admin
			$this->layout = View::make('layouts.admin');
			return Redirect::to('users/usersmanagement')->with('message', 'User succesfully changed!');
		}
		
		public function getLogout() {
			Auth::logout();
			return Redirect::to('users/login')->with('message', 'Your are now logged out!');
		}		
}
?>