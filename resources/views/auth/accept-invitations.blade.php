<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white shadow-lg rounded-xl p-8">

        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                Accept Invitation
            </h2>
            <p class="text-sm text-gray-500 mt-2">
                Complete your account setup to continue.
            </p>
        </div>

        @if (session('error'))
            <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('invitation.store', $user->invite_token) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Name
                </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter your name">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input type="password" name="password"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Enter password">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password
                </label>
                <input type="password" name="password_confirmation"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Confirm password">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                Accept Invitation
            </button>
        </form>
    </div>
</x-guest-layout>
