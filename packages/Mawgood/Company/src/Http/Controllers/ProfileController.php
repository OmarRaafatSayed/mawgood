<?php

namespace Mawgood\Company\Http\Controllers;

use Illuminate\Routing\Controller;
use Mawgood\Company\Http\Requests\UpdateCompanyProfileRequest;
use Mawgood\Company\Models\CompanyProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->guard('customer')->user();
        $profile = CompanyProfile::firstOrCreate(
            ['user_id' => $user->id],
            ['company_name' => $user->company_name ?? $user->name]
        );

        return view('mawgood-company::profile.index', compact('profile'));
    }

    public function update(UpdateCompanyProfileRequest $request)
    {
        $user = auth()->guard('customer')->user();
        $profile = CompanyProfile::where('user_id', $user->id)->firstOrFail();

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('company-logos', 'public');
        }

        $profile->update($data);

        return back()->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}
