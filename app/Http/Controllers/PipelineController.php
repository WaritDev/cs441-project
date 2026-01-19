<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // จำลองสถานะ (Stages)
        $stages = [
            ['id' => 'prospect', 'name' => 'Prospect', 'index' => 0],
            ['id' => 'contacted', 'name' => 'Contacted', 'index' => 1],
            ['id' => 'quoted', 'name' => 'Quoted', 'index' => 2],
            ['id' => 'negotiation', 'name' => 'Negotiation', 'index' => 3],
        ];

        // จำลอง Deals
        $deals = [
            [
                'id' => 1,
                'stage_id' => 'prospect',
                'customer_name' => 'นันต์',
                'company' => 'คุณอนันต์ รวยมาก',
                'amount' => 25000,
                'days_in_stage' => 2,
                'next_action' => 'ทัก LINE สอบถามความสนใจ',
                'due_date' => 'วันนี้',
                'has_warning' => false,
            ],
            [
                'id' => 2,
                'stage_id' => 'prospect',
                'customer_name' => 'บริษัท ABC จำกัด',
                'company' => '',
                'amount' => 150000,
                'days_in_stage' => 5,
                'next_action' => null, // Warning Case
                'due_date' => null,
                'has_warning' => true,
            ],
            [
                'id' => 3,
                'stage_id' => 'contacted',
                'customer_name' => 'เจ',
                'company' => 'คุณสมชาย วงศ์ดี',
                'amount' => 15000,
                'days_in_stage' => 3,
                'next_action' => 'ส่งใบเสนอราคา',
                'due_date' => 'พรุ่งนี้',
                'has_warning' => false,
            ],
            [
                'id' => 4,
                'stage_id' => 'quoted',
                'customer_name' => 'พี่หนุ่ม',
                'company' => 'คุณมานพ ธุรกิจดี',
                'amount' => 250000,
                'days_in_stage' => 5,
                'next_action' => 'Follow-up ใบเสนอราคา',
                'due_date' => 'วันนี้',
                'has_warning' => false,
            ],
            [
                'id' => 5,
                'stage_id' => 'negotiation',
                'customer_name' => 'ยุทธ',
                'company' => 'คุณประยุทธ์ มั่งมี',
                'amount' => 45000,
                'days_in_stage' => 2,
                'next_action' => 'ส่ง QR ชำระเงิน',
                'due_date' => 'วันนี้',
                'has_warning' => false,
            ],
        ];

        return view('pipelines.index', compact('stages', 'deals'));
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
