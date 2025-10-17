<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use App\Models\UserModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showModules()
    {

        $user = User::find(Auth::id());

        $modules = UserModule::with('modules')
            ->where('user_id', Auth::id())
            ->where('active', 1)
            ->get()
            ->pluck('modules');

        return response()->json(
            $modules
        );
    }

    public function activateModule($id)
    {
        $modules = UserModule::where('user_id', Auth::id())
            ->where('module_id', $id)
            ->first();

        if ($id<1 OR $id>5) {
           return response()->json(["message:" => "Module not found"], 404);
        }

        if (!$modules) {
            $modules = UserModule::create([
                'user_id' => Auth::id(),
                'module_id' => $id,
                'active' => true,
            ]);
        } else {

            $modules->active = true;
            $modules->save();
        };

        return response()->json(["message:" => "Module activated"], 200);
    }

    public function desactivateModule($id)
    {
        $modules = UserModule::where('user_id', Auth::id())
            ->where('module_id', $id)
            ->first();

        if (!$modules) {
            return response()->json(["message:" => "Module not found"], 404);
        } else {

            $modules->active = false;
            $modules->save();
        };

        return response()->json(["message:" => "Module desactivated"], 200);
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
