<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company\IdTypeModel;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::latest()->paginate();
        return view('web.vendor-pages.staffs.index', compact('staffs'));
    }

    public function create()
    {
        $id_types = IdTypeModel::all();

        return view('web.vendor-pages.staffs.create',compact('id_types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:staff',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:staff',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $fileName = 'image_' . time() . '.' . $request->image->extension();
            $filePath = $request->image->storeAs('images', $fileName, 'public');
            $validated['image'] = $filePath;
        }

        Staff::create($validated);
        return redirect()->route('web.users.staff.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('vendor-pages.staffs.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('vendor-pages.staffs.edit', compact('staff'));
    }

    public function update(Request $request, string $id)
    {
        $staff = Staff::findOrFail($id);

        $validated = $request->validate([
            'id_number' => 'required|unique:staff,id_number,' . $staff->id,
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:staff,email,' . $staff->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }

            $fileName = 'image_' . time() . '.' . $request->image->extension();
            $filePath = $request->image->storeAs('images', $fileName, 'public');
            $validated['image'] = $filePath;
        }

        $staff->update($validated);

        return redirect()->route('web.users.staff.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::findOrFail($id);

        // Delete the image if it exists
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }

        $staff->delete();

        return redirect()->route('web.users.staff.index')->with('success', 'Staff deleted successfully.');
    }

}
