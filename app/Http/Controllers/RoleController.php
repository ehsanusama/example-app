<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $url = "role";
        $btn = "Save";
        $data = compact('roles', 'url', 'btn');
        return view("admin.role")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'unique:roles,name'],
                'guard_name' => ['required', 'string'],
            ]
        );
        $role = new Role;
        $role->name = $request['name'];
        $role->guard_name = $request['guard_name'];
        if ($role->save()) :
            // Alert::toast('New Role Created', 'success');
            return back()->with('success', 'Task Created Successfully!');;
        else :
            Alert::toast('Something Went Wrong', 'error');
            return back();
        endif;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = "";
        $btn = "Update";
        $roles = Role::all();
        $role = Role::find($id);
        if (is_null($role)) {
            //nothing
        } else {
            $data = compact('roles', 'role', 'url', 'btn');
        }
        return view('admin.role')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $request->validate(
            [
                'name' => ['required', 'string'],
                'guard_name' => ['required', 'string'],
            ]
        );
        $role->name = $request['name'];
        $role->guard_name = $request['guard_name'];
        if ($role->save()) :
            Alert::toast('Role Updated', 'success');
            return redirect('admin/role');
        else :
            Alert::toast('Something Went Wrong', 'error');
            return redirect('admin/role');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            if ($role->forceDelete()) :
                Alert::toast('Role Deleted', 'success');
            endif;

            return redirect()->back();
        }
    }
}
