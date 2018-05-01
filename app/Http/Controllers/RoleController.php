<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleController extends Controller
{
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
        $roles = Role::paginate(5);

        return view('users-mgmt/role/index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-mgmt/role/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        Role::create([
            'name' => $request['name'],
            'role_code' => $request['role_code']
        ]);

        return redirect()->intended('user-management/role');
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
        $role = Role::find($id);
        // Redirect to country list if updating country wasn't existed
        if ($role == null || count($role) == 0) {
            return redirect()->intended('/user-management/role');
        }

        return view('users-mgmt/role/edit', ['role' => $role]);
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
        $role = Role::findOrFail($id);
        $input = [
            'name' => $request['name'],
            'role_code' => $request['role_code']
        ];
        $this->validate($request, [
            'name' => 'required|max:150'
        ]);
        Role::where('id', $id)
            ->update($input);

        return redirect()->intended('user-management/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect()->intended('user-management/role');
    }

    /**
     * Search country from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name'],
            'role_code' => $request['role_code']
        ];

        $roles = $this->doSearchingQuery($constraints);
        return view('users-mgmt/role/index', ['roles' => $roles, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = role::query();
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
            'name' => 'required|max:150|unique:role',
            'role_code' => 'required|max:10|unique:role'
        ]);
    }
}
