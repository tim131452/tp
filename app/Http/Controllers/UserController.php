<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'user-management/user';

         /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->leftJoin('role', 'users.role_id', '=', 'role.id')
            ->select('users.*', 'role.name as role_name', 'role.id as role_id')
            ->paginate(5);

        return view('users-mgmt/user/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users-mgmt/user/create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::findOrFail($request['role_id']);
        $this->validateInput($request);
         User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
             'role_id' => $request['role_id']
            //'firstname' => $request['firstname'],
            //'lastname' => $request['lastname']
        ]);

        return redirect()->intended('user-management/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($user == null || count($user) == 0) {
            return redirect()->intended('/user-management/user');
        }

        $roles = Role::all();
        return view('users-mgmt/user/edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $constraints = [
            'username' => 'required|max:20'
            //'firstname'=> 'required|max:60',
            //'lastname' => 'required|max:60'
            ];
        $input = [
            'username' => $request['username'],
            'role_id' => $request['role_id']
            //'firstname' => $request['firstname'],
            //'lastname' => $request['lastname']
        ];
        if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        User::where('id', $id)
            ->update($input);
        
        return redirect()->intended('user-management/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
         return redirect()->intended('user-management/user');
    }

    /**
     * Search user from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'username' => $request['username'],
            'role.name' => $request['role_name']
            //'firstname' => $request['firstname'],
           // 'lastname' => $request['lastname'],
            //'department' => $request['department']
            ];

       $users = $this->doSearchingQuery($constraints);
       $constraints['role_name'] = $request['role_name'];
       return view('users-mgmt/user/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        //$query = User::query();
        $query = DB::table('users')
         ->leftJoin('role', 'users.role_id', '=', 'role.id')
         ->select('users.username as username', 'users.*','role.name as role_name', 'role.id as role_id');

        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'username' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'role_id' => 'required',
        'password' => 'required|min:6|confirmed'
        //'firstname' => 'required|max:60',
        //'lastname' => 'required|max:60'
    ]);
    }
}
