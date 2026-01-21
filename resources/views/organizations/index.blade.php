@extends('layouts.app')

@section('content')

    <div class="space-y-6">

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Manage Organizations</h2>
                <p class="text-sm text-slate-500 mt-1">Overview of partner organizations.</p>
            </div>

            @can('create', App\Models\Organization::class)
            <a href="{{ route('organizations.create') }}" class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white transition-colors bg-emerald-600 rounded-lg hover:bg-emerald-700 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Organization
            </a>
            @endcan
        </div>

        <div class="overflow-hidden bg-white border border-slate-200 rounded-xl shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-semibold tracking-wider">
                        <th class="px-6 py-4">Organization Name</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">Tax ID</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                    @forelse($organizations as $organization)
                        <tr class="hover:bg-slate-50 transition-colors group">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 text-white bg-gradient-to-br from-slate-500 to-slate-600 rounded-full font-bold shadow-sm ring-2 ring-white">
                                        {{ substr($organization->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">{{ $organization->name }}</p>
                                    </div>
                                </div>
                            </td>
<!-- 
                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $organization->address ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $organization->tax_id ?? '-' }}
                            </td> -->

                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2 opacity-60 group-hover:opacity-100 transition-opacity">

                                    <a href="{{ route('organizations.edit', $organization->id) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Organization">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                    <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $organization->name }}?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete Organization">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                                No organizations found. Click "Add Organization" to create one.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
