@extends('layouts.admin')

@section('content')
    <style>
        .image-upload>input {
            display: none;
        }
    </style>
    <x-messages-noty />

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('users.update_profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Profile</h2>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">Save</button>
                </div>
                <div class="mt-4 flex items-center">
                    <!-- Image upload button -->
                    <div class="image-upload mr-4">
                        <label for="file-input">
                            <img src="{{ getImage($user->avatar) }}" alt="Profile picture"
                                class="rounded-full w-24 h-24 object-cover cursor-pointer" />
                        </label>
                        <input id="file-input" type="file" name="image" />
                    </div>
                    <!-- Profile details -->
                    <div class="flex flex-col">
                        <label for="name" class="text-gray-600">@lang('Name')</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                            class="border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <label for="email" class="text-gray-600 mt-2">@lang('Email')</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                            class="border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <label for="old_password" class="text-gray-600">@lang('old password')</label>
                        <input type="password" id="old_password" name="old_password"
                            class="border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="new_password" class="text-gray-600">@lang('new password')</label>
                        <input type="password" id="new_password" name="new_password"
                            class="border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="new_password" class="text-gray-600">@lang('confirmation password')</label>

                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                            class="border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                    </div>
                </div>
            </form>
            <!-- Social media links -->
            <div class="mt-4 flex items-center space-x-4">
                <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="module">
        // Select the file input element
        const fileInput = $("#file-input");
        // Select the image element
        const image = $("img");
        // Add a change event handler to the file input
        fileInput.on("change", function() {
            // Get the selected file
            const file = this.files[0];
            // Check if the file is an image
            if (file && file.type.startsWith("image/")) {
                // Create a new FileReader object
                const reader = new FileReader();
                // Add a load event handler to the reader
                reader.onload = function() {
                    // Update the image source with the data URL
                    image.attr("src", this.result);
                };
                // Read the file as a data URL
                reader.readAsDataURL(file);
            }
        });





    </script>
@endpush
