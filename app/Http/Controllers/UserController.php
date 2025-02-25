<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\District;
use App\Models\Halqa;
use App\Models\Tehsil;
use App\Models\Divsion;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
    public function AddUser(){
        $roles = Role::all(); 
        $Halqas = Halqa::all(); 
        $districts = District::all();
        $tehsils = Tehsil::all();
        $divsions = Divsion::all(); 
        $usersWithRoles = DB::table('users')
        ->leftJoin('assign_roles', 'users.role_id', '=', 'assign_roles.role_id')
        ->leftJoin('permissions', 'assign_roles.permission_id', '=', 'permissions.id')
        ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
        ->select(
            'users.id',
            'users.name as user_name',
            'users.email',
            'users.phone_number',
            'users.password',
            'roles.name as role_name',
            'permissions.name as permission_name'
        )
        ->get();
    
    

        return view('UserManagement.AddUser' ,['roles' => $roles,'Halqas' => $Halqas,
        'usersWithRoles' => $usersWithRoles,'districts'=>$districts,'divsions'=>$divsions,'tehsils'=>$tehsils]);
    
        
   
}
public function Halqa($tehsilId)
{
    // Fetch halqas related to the tehsil ID
    $halqas = Halqa::where('tehsil_id', $tehsilId)->get(['id', 'halqa_name']);

    // Return the response as JSON
    return response()->json($halqas);
}
public function storeUser(Request $request)
{
    // Validate incoming data
 
    // Create a new user record
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->password),

        'phone_number' => $request->input('phone_number'),
        'role_id' => $request->input('role_id'),
        'halqa_id' => $request->input('halqa_id'),
    ]);

    // Assign role to user
  

    return redirect()->back()->with('success', 'User added successfully.');
}
public function destroy($id)
{
    $users = User::findOrFail($id);
    $users->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}

}
