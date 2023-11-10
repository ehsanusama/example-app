<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::all();
        //$permission = Permission::find($id);
        $btn = 'Add';
        $method = 'POST';
        $data = compact('permission', 'btn', 'method');
        return view('admin.permissions')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'min:3'],
                'guard_name' => ['required', 'string'],
            ]
        );
        $permissions = new Permission;
        $permissions->name = $request['name'];
        $permissions->guard_name = $request['guard_name'];
        if ($permissions->save()) :
            // Alert::toast('New Role Created', 'success');
            return back()->with('success', 'Permission Created Successfully!');;
        else :
            Alert::toast('Something Went Wrong', 'error');
            return back();
        endif;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $method = 'PUT';
        $btn = "Update";
        $permission = Permission::all();
        $permissions = Permission::find($id);
        if (is_null($permission)) {
            //nothing
        } else {
            $data = compact('permissions', 'permission', 'btn', 'method');
        }
        return view('admin.permissions')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'guard_name' => ['required', 'string'],
        ]);

        $permission->name = $data['name'];
        $permission->guard_name = $data['guard_name'];

        if ($permission->update()) {
            return redirect()->route('admin.permission.index')->with('success', 'Permission Updated Successfully!');
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
