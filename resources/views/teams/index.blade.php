@extends('layouts.app')

@section('content')

    @php
        $mockTeams = [
            [
                'id' => 1,
                'name' => 'Team Alpha (Sales 1)',
                'members' => [
                    ['name' => 'John Somchai', 'avatar' => 'J'],
                    ['name' => 'Sarah Kaewta', 'avatar' => 'S'],
                ]
            ],
            [
                'id' => 2,
                'name' => 'Team Beta (Enterprise)',
                'members' => [
                    ['name' => 'David Kob', 'avatar' => 'D'],
                ]
            ],
            [
                'id' => 3,
                'name' => 'Team Charlie (Support)',
                'members' => []
            ]
        ];
    @endphp

    <div class="space-y-8">

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Team Management</h2>
                <p class="text-sm text-slate-500">Create teams and assign sales members.</p>
            </div>

            <div class="flex items-center gap-2 w-full md:w-auto">
                <input type="text" placeholder="New Team Name..." class="px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 text-sm w-full md:w-64">
                <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 text-sm font-medium whitespace-nowrap shadow-sm transition-all">
                    + Create Team
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($mockTeams as $team)
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm flex flex-col h-full hover:shadow-md transition-shadow duration-200">

                    <div class="p-4 border-b border-slate-100 flex justify-between items-start bg-slate-50 rounded-t-xl">
                        <div>
                            <h3 class="font-bold text-lg text-slate-800">{{ $team['name'] }}</h3>
                            <span class="text-xs text-slate-500 font-medium">{{ count($team['members']) }} Members</span>
                        </div>
                        <button class="text-slate-400 hover:text-red-500 p-1 rounded-md hover:bg-red-50 transition-colors" title="Delete Team">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>

                    <div class="p-4 flex-1 space-y-3">
                        @if(empty($team['members']))
                            <div class="flex flex-col items-center justify-center h-full py-6 text-slate-400">
                                <svg class="w-8 h-8 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <p class="text-sm">No members yet</p>
                            </div>
                        @else
                            <ul class="space-y-2">
                                @foreach($team['members'] as $member)
                                    <li class="flex items-center justify-between text-sm group p-1 rounded hover:bg-slate-50">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs font-bold ring-2 ring-white shadow-sm">
                                                {{ $member['avatar'] }}
                                            </div>
                                            <span class="text-slate-700 font-medium">{{ $member['name'] }}</span>
                                        </div>
                                        <button class="text-slate-300 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1" title="Remove from team">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="p-4 border-t border-slate-100 bg-slate-50 rounded-b-xl">
                        <div class="flex gap-2">
                            <select class="flex-1 text-sm border-slate-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 bg-white text-slate-600 cursor-pointer">
                                <option value="">+ Add Sales Member...</option>
                                <option value="1">Tony Stark</option>
                                <option value="2">Steve Rogers</option>
                            </select>
                            <button class="bg-white border border-slate-300 hover:bg-emerald-50 hover:border-emerald-300 hover:text-emerald-600 text-slate-600 rounded-lg px-3 py-2 transition-all shadow-sm">
                                Add
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
