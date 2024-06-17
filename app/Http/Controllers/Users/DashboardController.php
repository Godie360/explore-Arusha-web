<?php

namespace App\Http\Controllers\Users;

use App\Enums\CompanyStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Company\IdTypeModel;
use App\Models\Company\StaffModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_staffs = StaffModel::count();
        $active_staffs = StaffModel::where('status',CompanyStatusEnum::Active->value)->count();
        return view('web.vendor-pages.index',compact('total_staffs','active_staffs'));
    }

    public function profile()
    {
        $id_types = IdTypeModel::all();
        return view('web.vendor-pages.profile', compact('id_types'));
    }
    public function profile_store(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $id = $user->id;
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:users,phone,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'address' => 'required|string|max:255',
            'id_type_id' => 'required|uuid|exists:id_types,id',
            'id_number' => 'required|string|max:255|unique:users,id_number,' . $id,
        ]);


        if ($request->hasFile('image')) {
            $request->merge([
                'profile_photo_path' => upload_file("image", "profiles"),
            ]);
        } else {
            $request->merge([
                'profile_photo_path' => $user->profile_photo_path,
            ]);
        }

        $user->update($request->except('_token', 'image'));


        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $hashedPassword = $user->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (Hash::check($request->current_password, $hashedPassword)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with('success', 'Password successfully changed!');
            } else {
                return redirect()->back()->with('warning', 'new password can not be the old password!');
            }
        } else {
            return redirect()->back()->with('danger', 'old password doesnt matched');
        }
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
