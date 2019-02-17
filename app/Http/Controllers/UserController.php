<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use App\User;
use App\Desa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::all();
        $role = DB::table('roles')->get();
        return view('user.index', compact('desa', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nm_user' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required|max:50',
            ]);

            if ($validator->passes()) {
    
                // Store your user in database 
                $user = new User;
                $user->name = $request->nm_user;
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                if ($request->role == 1) {
                    $user->id_desa = 0;
                } else {
                    $user->id_desa = $request->id_desa;
                }

                if ($user->save()) {
                    $iduser = User::where('username', $request->username)->first();
                    DB::table('model_has_roles')->insert([
                        ['role_id' => $request->role, 'model_type' => 'App\User', 'model_id' => $iduser['id']]
                    ]);
                    return response()->json(['success' => '1']);
                }
            }

            return response()->json(['errorsvalidation' => $validator->errors()]);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_user' => 'required|string|max:255',
                'password' => 'required|string|min:6|confirmed',
                'roles' => 'required|max:50',
            ]);

            if ($validator->passes()) {
    
                // Store your user in database 
                $user = User::find($request->id);
                $user->name = $request->nama_user;
                $user->password = Hash::make($request->password);
                if ($request->role == 1) {
                    $user->id_desa = 0;
                } else {
                    $user->id_desa = $request->iddesa;
                }

                if ($user->save()) {
                    DB::table('model_has_roles')->where('model_id', $request->id)
                        ->update(['role_id' => $request->roles]);
                    return response()->json(['success' => '1']);
                }
            }

            return response()->json(['errorsvalidation' => $validator->errors()]);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->status = 0;
            $user->save();
            return response()->json(['success' => '1']);
        } catch (Exception $e) {
            return response()->json(['errors' => '1']);
        }
    }

    public function getUser()
    {
        $user = User::Listuser();

        return response()->json(array('data' => $user));
    }
}