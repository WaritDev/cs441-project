<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'fullname' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:100', // DB: nullable
            'phone'    => 'nullable|string|max:20',  // DB: nullable
            'line_id'  => 'nullable|string|max:100', // DB: nullable
            'email'    => 'nullable|email|max:255',
            'province' => 'nullable|string|max:100',
            'address'  => 'nullable|string',
            // รูปภาพ validate เป็นไฟล์รูป
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'user_id'     => Auth::id(),
            'team_id'     => Auth::user()->current_team_id ?? 1, // กรณีใช้ Jetstream Teams หรือกำหนด Default team

            // Text Fields
            'name'        => $request->fullname,    // Form: fullname -> DB: name
            'nickname'    => $request->nickname,
            'phone_num'   => $request->phone,       // Form: phone -> DB: phone_num
            'line_id'     => $request->line_id,
            'email'       => $request->email,
            'province'    => $request->province,
            'address'     => $request->address,

            // Logic Conversion
            // Form ส่งมาเป็น on/null -> แปลงเป็น active/inactive
            'status'      => $request->boolean('is_active') ? 'active' : 'inactive',
        ];

        if ($request->hasFile('avatar')) {
            // save ลง storage/app/public/customers
            $path = $request->file('avatar')->store('customers', 'public');
            $data['img_profile'] = $path; // DB: img_profile
        }

        Customer::create($data);

        return redirect()->route('customers.index')
            ->with('success', 'เพิ่มลูกค้าใหม่เรียบร้อยแล้ว');
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
