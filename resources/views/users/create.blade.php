@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-slate-800">Add New User</h2>
            <a href="{{ route('users.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Back to list</a>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <form action="#" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                        <select name="role" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 bg-white">
                            <option value="sales">Sales</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Assign Team</label>
                        <select name="team_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 bg-white">
                            <option value="">- No Team -</option>
                            {{-- Mockup Data: ของจริงต้องวน Loop $teams --}}
                            <option value="1">Team Alpha</option>
                            <option value="2">Team Beta</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-2 rounded-lg hover:bg-emerald-700 font-medium shadow-sm transition-all">
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
