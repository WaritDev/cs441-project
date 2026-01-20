<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Customer;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('team_id', Auth::user()->getTeamId())
            ->where('status', 'active')
            ->get()
            ->map(function($c) {
                return [
                    'id' => $c->id,
                    'label' => "{$c->name} ({$c->nickname}) - {$c->line_id}"
                ];
            });

        return view('deals.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'stage' => 'required|string',
            'next_action' => 'required|string',
            'next_action_date' => 'required|date',
            'expected_close_date' => 'nullable|date',
        ]);

        $deal = Deal::create([
            'team_id' => Auth::user()->current_team_id,
            'user_id' => Auth::id(),
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'stage' => $request->stage,
            'expected_close_date' => $request->expected_close_date,
            'description' => $request->description,
        ]);


        Activity::create([
            'deal_id' => $deal->id,
            'user_id' => Auth::id(),
            'type' => 'task',
            'title' => $request->next_action,
            'due_date' => $request->next_action_date,
            'is_completed' => false
        ]);

        return redirect()->route('pipelines.index')->with('success', 'สร้างดีลและกำหนดงานถัดไปเรียบร้อยแล้ว');
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
    public function edit(Deal $deal)
    {
        $customers = Customer::all(); // (In real app, filter by team)

        // ดึง Timeline กิจกรรม
        $activities = $deal->activities()->orderBy('created_at', 'desc')->get();

        return view('deals.edit', compact('deal', 'customers', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        // Validation: ถ้า Stage ไม่ใช่ Lost/Won ต้องบังคับ Next Action
        $rules = [
            'name' => 'required',
            'amount' => 'required',
            'stage' => 'required',
        ];

        // Custom Validation Rule: ห้ามทิ้งขว้างลูกค้า
        if (!in_array($request->stage, ['won', 'lost'])) {
            $rules['next_action'] = 'required';
            $rules['next_action_date'] = 'required';
        }

        if ($request->stage == 'lost') {
            $rules['lost_reason'] = 'required';
        }

        $request->validate($rules);

        // $deal->update(...)

        return redirect()->route('pipelines.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
