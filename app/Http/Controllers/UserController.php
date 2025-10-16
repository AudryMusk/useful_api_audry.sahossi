<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showModules()
    {
        // $user = User::find(Auth::id());
        // $modules = $user->modules()->orderBy('id')->where('active', 1)->get();


        $user = User::find(Auth::id());

        // $user->modules()->attach($module_ids);
        $modules = ($user->modules()->orderBy('id')->where('active', 1)->get());
        return response()->json(
            $modules
        );
    }

    public function activateModule($id)
    {
        $user = User::find(Auth::id());

        $module = $user->modules()->attach([$id]);

        return response()->json($module);
    }

    /**
     * Display a listing of the resource.
     */

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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
