@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-slate-800">Edit User</h2>
            <a href="{{ route('users.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Cancel</a>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
            <form action="#" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                    <input type="text" name="name" value="John Somchai" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="john@flowcrm.com" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                        <select name="role" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 bg-white">
                            <option value="sales">Sales</option>
                            <option value="manager" selected>Manager</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Assign Team</label>
                        <select name="team_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 bg-white">
                            <option value="">- No Team -</option>
                            <option value="1" selected>Team Alpha</option>
                            <option value="2">Team Beta</option>
                        </select>
                    </div>
                </div>

                <hr class="border-slate-100 my-4">
                <p class="text-xs text-slate-400">Leave password blank if you don't want to change it.</p>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">New Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <a href="{{ route('users.index') }}" class="px-4 py-2 border border-slate-300 text-slate-600 rounded-lg hover:bg-slate-50 font-medium">Cancel</a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-medium shadow-sm transition-all">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
