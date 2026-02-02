<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
        <div class="p-6 max-w-3xl mx-auto">
            <form action="{{ route('users.search') }}" method="GET">
                <input
                    type="text"
                    name="q"
                    placeholder="Search by username..."
                    value="{{ $query }}"
                    class="w-full p-2 border rounded"
                >
            </form>

            <div class="mt-4 space-y-3">
                @forelse($users as $user)
                    <div class="flex items-center space-x-3 p-2 border rounded gap-6">
                        <img
                            class="h-20 w-20 rounded-full object-cover"
                            src="{{ $user->profile_photo
                            ? asset('storage/' . $user->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($user->username)
                        }}"
                        >
                        <span>{{ $user->username }}</span>
                    </div>
                @empty
                    <p class="text-gray-500">Search for a user by username</p>
                @endforelse
            </div>
        </div>


</x-app-layout>
