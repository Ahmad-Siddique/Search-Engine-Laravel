<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleName;
use Illuminate\Support\Facades\Auth;

class ModuleNameController extends Controller
{
    public function showForm(Request $request)
    {
        $user = $request->session()->get('user');
        $userId = $user->id;
        $moduleNames = ModuleName::firstOrCreate(['user_id' => $userId]);

        // Put module names in the session
        $request->session()->put('module_names', $moduleNames);

        return view('module_names.form', compact('moduleNames'));
    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        $userId = $user->id;

        $moduleNames = ModuleName::updateOrCreate(
            ['user_id' => $userId],
            $request->only(['material', 'resource', 'service', 'equipment', 'reference', 'gallery'])
        );

        // Update the session with the new module names
        $request->session()->put('module_names', $moduleNames);

        return redirect()->back()->with('success', 'Module names updated successfully!');
    }

}

