<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\Disclaimer;

class PrivacyPolicyController extends Controller
{
    /**
     * Show the form for editing the privacy policy.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $policy = PrivacyPolicy::firstOrNew(['id' => 1]); // Use firstOrNew to handle non-existing record
        return view('privacy-policies.edit', compact('policy'));
    }

    /**
     * Update the privacy policy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $policy = PrivacyPolicy::updateOrCreate(['id' => 1], $request->only('content'));

        return redirect()->route('privacy-policies.edit')
                         ->with('success', 'Privacy Policy updated successfully.');
    }


    public function disclaimeredit()
    {
        $policy = Disclaimer::firstOrNew(['id' => 1]); // Use firstOrNew to handle non-existing record
        // return $policy;
        return view('privacy-policies.disclaimeredit', compact('policy'));
    }

    /**
     * Update the privacy policy in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function disclaimerupdate(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $policy = Disclaimer::updateOrCreate(['id' => 1], $request->only('content'));

        return redirect()->route('disclaimer.edit')
                         ->with('success', 'Disclaimer updated successfully.');
    }
}
