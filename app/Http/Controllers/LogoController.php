<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoChange;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function showForm()
    {

        $logoChange = null;
        if (Storage::disk('public')->exists('logos/logo.png')) {
            $logoChange = Storage::url('logos/logo.png');
        }

       

        // Pass the logo existence status to the view
        return view('logo.logo_form', compact('logoChange'));
    
    }

    public function upload(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Check if the old logo exists and delete it
            if (Storage::disk('public')->exists('logos/logo.png')) {
                Storage::disk('public')->delete('logos/logo.png');
            }

            // Store new logo with specific name
            $path = $request->file('logo')->storeAs('logos', 'logo.png', 'public');
        }

        return redirect()->back()->with('success', 'Logo uploaded successfully!');
    }
}
