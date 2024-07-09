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

    try {
        // Fetch the first record or create a new one with default values if none exists
        $moduleNames = ModuleName::firstOrCreate([], [
            'user_id'=> $user->id,
            'material' => 'material',
            'resource' => 'resource',
            'service' => 'service',
            'equipment' => 'equipment',
            'reference' => 'reference',
            'gallery' => 'gallery',
            'knowledgebase' => 'Knowledgebase',
        ]);
    // return "gg";
        // Put module names in the session
        $request->session()->put('module_names', $moduleNames);

        return view('module_names.form', compact('moduleNames'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while fetching or creating the module names.');
    }
}

public function update(Request $request)
{
    $user = $request->session()->get('user');

    // Check if the user is an admin
    if ($user->role !== 'admin') {
        return redirect()->back()->with('error', 'Only admins can update the module names.');
    }
  
    try {
        // Fetch the first record
        $moduleNames = ModuleName::first();

        // If no record exists, create one with default values
        if (!$moduleNames) {
            $moduleNames = new ModuleName([
                'user_id'=> $user->id,
                'material' => 'material',
                'resource' => 'resource',
                'service' => 'service',
                'equipment' => 'equipment',
                'reference' => 'reference',
                'gallery' => 'gallery',
                'knowledgebase' => 'Knowledgebase',
            ]);
        }

        // Update the record with the new data
        $moduleNames->fill($request->only(['material', 'resource', 'service', 'equipment', 'reference', 'gallery','knowledgebase']));
        $moduleNames->save();

        // return $moduleNames;
        // Update the session with the new module names
        $request->session()->put('module_names', $moduleNames);

        return redirect()->back()->with('success', 'Module names updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while updating the module names.');
    }
}
}

