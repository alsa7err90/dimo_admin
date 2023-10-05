<div class="relative mb-3">

    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ $label }}</label>
    <input type="email" value="{{ $value ?? '' }}" name="{{ $name }}" id="{{ $id }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="{{ $placeholder ?? '' }}" {{ $required ?? '' }} />
    @if (isset($message))
        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400"> {!! $message !!}.
        </p>
    @endif
</div>
