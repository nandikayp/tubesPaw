@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-stone-900">Dashboard</h1>
        <p class="text-stone-600">Welcome back, Admin!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-stone-500 mb-1">Total Users</p>
                <h3 class="text-2xl font-bold text-stone-900">1,234</h3>
                <span
                    class="inline-flex items-center text-xs font-medium text-green-600 bg-green-50 px-2 py-0.5 rounded-full mt-2">
                    +12% from last month
                </span>
            </div>
            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-stone-500 mb-1">Total Bookings</p>
                <h3 class="text-2xl font-bold text-stone-900">856</h3>
                <span
                    class="inline-flex items-center text-xs font-medium text-green-600 bg-green-50 px-2 py-0.5 rounded-full mt-2">
                    +5% from last month
                </span>
            </div>
            <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-stone-500 mb-1">Active Rooms</p>
                <h3 class="text-2xl font-bold text-stone-900">12</h3>
                <span
                    class="inline-flex items-center text-xs font-medium text-stone-500 bg-stone-100 px-2 py-0.5 rounded-full mt-2">
                    Active
                </span>
            </div>
            <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-stone-500 mb-1">Pending Requests</p>
                <h3 class="text-2xl font-bold text-stone-900">5</h3>
                <span
                    class="inline-flex items-center text-xs font-medium text-red-600 bg-red-50 px-2 py-0.5 rounded-full mt-2">
                    Action Required
                </span>
            </div>
            <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center text-purple-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Quick Actions or Recent Activity Placeholder -->
    <div class="grid lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
            <h2 class="text-lg font-bold text-stone-900 mb-4">Recent Reservations</h2>
            <div class="space-y-4">
                <!-- Data Placeholder -->
                <div class="flex items-center gap-4 pb-4 border-b border-stone-100 last:border-0 last:pb-0">
                    <div
                        class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center font-bold text-stone-500">
                        U1
                    </div>
                    <div>
                        <p class="font-medium text-stone-900">User 1 booking Room A</p>
                        <p class="text-sm text-stone-500">2 hours ago</p>
                    </div>
                    <div class="ml-auto">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Pending
                        </span>
                    </div>
                </div>
                <div class="flex items-center gap-4 pb-4 border-b border-stone-100 last:border-0 last:pb-0">
                    <div
                        class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center font-bold text-stone-500">
                        U2
                    </div>
                    <div>
                        <p class="font-medium text-stone-900">User 2 booking Lab B</p>
                        <p class="text-sm text-stone-500">5 hours ago</p>
                    </div>
                    <div class="ml-auto">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Approved
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
