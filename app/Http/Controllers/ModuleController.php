<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return response()->json([
            $modules
        ]);
    }

    public function showModules()
    {
        $user = User::find(Auth::id());
        $modules = $user->modules;
        return response()->json(
            $module
        );
    }
}
