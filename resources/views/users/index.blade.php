@extends('layouts.app')

@section('content')

    @php
        $mockUsers = [
            [
                'id' => 1,
                'name' => 'John Somchai',
                'email' => 'john@flowcrm.com',
                'role' => 'Sale',
                'team' => 'Team Alpha',
                'team_color' => 'bg-purple-100 text-purple-700',
                'last_login' => '2 minutes ago',
                'status' => 'Active'
            ],
            [
                'id' => 2,
                'name' => 'Sarah Kaewta',
                'email' => 'sarah@flowcrm.com',
                'role' => 'Sales',
                'team' => 'Team Alpha',
                'team_color' => 'bg-blue-100 text-blue-700',
                'last_login' => '1 day ago',
                'status' => 'Active'
            ],
            [
                'id' => 3,
                'name' => 'David Kob',
                'email' => 'david@flowcrm.com',
                'role' => 'Sales',
                'team' => 'Team Beta',
                'team_color' => 'bg-orange-100 text-orange-700',
                'last_login' => '3 days ago',
                'status' => 'Inactive'
            ],
            [
                'id' => 4,
                'name' => 'New Guy',
                'email' => 'new@flowcrm.com',
                'role' => 'Sales',
                'team' => null,
                'team_color' => 'bg-slate-100 text-slate-500',
                'last_login' => 'Never',
                'status' => 'Active'
            ]
        ];
    @endphp

    <div class="space-y-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manage Users</h2>
                <p class="text-sm text-slate-500 mt-1">Overview of all system users and their roles.</p>
            </div>

            <a href="{{ route('users.create') }}" class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white transition-colors bg-emerald-600 rounded-lg hover:bg-emerald-700 shadow-sm focus:ring-4 focus:ring-emerald-500/20">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New User
            </a>
        </div>

        <div class="overflow-hidden bg-white border border-slate-200 rounded-xl shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-semibold tracking-wider">
                        <th class="px-6 py-4">User</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Team</th>
                        <th class="px-6 py-4">Last Login</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                    @foreach($mockUsers as $user)
                        <tr class="hover:bg-slate-50 transition-colors group">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 text-white bg-gradient-to-br from-slate-500 to-slate-600 rounded-full font-bold shadow-sm ring-2 ring-white">
                                        {{ substr($user['name'], 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">{{ $user['name'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium border {{ $user['role'] === 'Manager' ? 'bg-purple-50 text-purple-700 border-purple-200' : 'bg-slate-50 text-slate-700 border-slate-200' }}">
                                    @if($user['role'] === 'Manager')
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    @endif
                                    {{ $user['role'] }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                @if($user['team'])
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user['team_color'] }}">
                                        {{ $user['team'] }}
                                    </span>
                                @else
                                    <span class="text-xs text-slate-400 italic flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        No Team
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $user['last_login'] }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2 opacity-60 group-hover:opacity-100 transition-opacity">

                                    {{-- ปุ่ม Edit: ใช้ <a> ลิงก์ไปหน้า Edit --}}
                                    {{-- ใช้ $user['id'] ในการส่ง parameter (ถึงแม้จะเป็น Mock แต่เขียนให้เหมือนจริง) --}}
                                    <a href="{{ route('users.edit', $user['id']) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit User">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    {{-- ปุ่ม Delete: ใช้ <button> ปกติ (ยังไม่ได้ทำ Route Delete) --}}
                                    <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete User" onclick="confirm('Are you sure you want to delete this user? (Mockup)')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
                <span class="text-xs text-slate-500">Showing 1 to 4 of 4 entries</span>
                <div class="flex gap-1">
                    <button class="px-3 py-1 text-xs border border-slate-300 rounded hover:bg-white disabled:opacity-50 text-slate-500" disabled>Previous</button>
                    <button class="px-3 py-1 text-xs border border-slate-300 rounded hover:bg-white disabled:opacity-50 text-slate-500" disabled>Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection
