<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;

class ClientController extends Controller
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
        $clients = Client::paginate(5);

        return view('system-mgmt/client/index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/client/create');
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
        Client::create([
            'client_name' => $request['client_name'],
            'client_code' => $request['client_code'],
            'client_desc' => $request['client_desc']
        ]);

        return redirect()->intended('system-management/client');
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
        $client = Client::find($id);
        // Redirect to country list if updating country wasn't existed
        if ($client == null || count($client) == 0) {
            return redirect()->intended('/system-management/client');
        }

        return view('system-mgmt/client/edit', ['client' => $client]);
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
        $client = Client::findOrFail($id);
        $input = [
            'client_name' => $request['client_name'],
            'client_code' => $request['client_code'],
            'client_desc' => $request['client_desc']
        ];
        $this->validate($request, [
            'name' => 'required|max:60'
        ]);
        Client::where('id', $id)
            ->update($input);

        return redirect()->intended('system-management/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::where('id', $id)->delete();
        return redirect()->intended('system-management/client');
    }

    /**
     * Search country from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'client_name' => $request['client_name'],
            'client_code' => $request['client_code'],
            'client_desc' => $request['client_desc']
        ];

        $clients = $this->doSearchingQuery($constraints);
        return view('system-mgmt/client/index', ['clients' => $clients, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = client::query();
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
            'client_name' => 'required|max:60|unique:client',
            'client_code' => 'required|max:3|unique:client',
            'client_desc' => 'required|max:150|unique:client'
        ]);
    }
}