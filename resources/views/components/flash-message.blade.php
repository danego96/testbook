  @if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" role="alert" class=" text-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif

@if (session()->has('error'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" role="alert" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"">
    <p>
        {{ session('error') }}
    </p>
</div>
@endif