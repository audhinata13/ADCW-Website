<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $item = CompanyProfile::first();
        return view('pages.company-profile.index', [
            'title' => 'Company Profile',
            'item' => $item
        ]);
    }

    public function update()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'description' => ['required'],
            'vision' => ['required'],
            'mission' => ['required'],
            'image' => ['image']
        ]);

        $item = CompanyProfile::first();

        try {
            $data = request()->except(['image']);

            if ($item) {
                if (request()->file('image')) {
                    $data['image'] = request()->file('image');
                }
                $item->update($data);
            } else {
                $data['image'] = null;
                CompanyProfile::create($data);
            }
            return redirect()->route('company-profile.index')->with('success', 'Company Profile berhasil diupdate.');

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('company-profile.index')->with('error', 'Company Profile gagal diupdate.');
        }
    }
}
