<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Messages</h1>

        @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-4 rounded mb-6 shadow-lg">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('messages.store') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            <div class="form-group mb-6">
                <label for="receiver" class="block text-gray-800 text-lg font-medium mb-2">Select User:</label>
                <select name="receiver_id" id="receiver" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-6">
                <label for="message" class="block text-gray-800 text-lg font-medium mb-2">Message:</label>
                <textarea name="message" id="message" required
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    rows="4"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white p-3 rounded-md hover:bg-indigo-700 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Send
                Message</button>
        </form>

        <h2 class="text-3xl font-semibold text-gray-900 mt-8">Your Messages</h2>
        <ul class="mt-4 space-y-4">
            @foreach($messages as $message)
            <li class="bg-gray-100 p-4 rounded-md shadow-md hover:shadow-lg transition duration-200 ease-in-out">
                <strong class="text-indigo-600">{{ $message->sender->name }}:</strong>
                <span class="text-gray-700">{{ $message->message }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>