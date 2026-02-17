<div class="text-center py-20">
    <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 mb-6">
        <x-icon name="cog-8-tooth" class="w-12 h-12 text-gray-400 animate-spin-slow" />
    </div>
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $title }}</h2>
    <p class="mt-4 text-lg leading-6 text-gray-500">{{ $message }}</p>
    <div class="mt-10">
        <a href="{{ route('dashboard') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            Volver al Dashboard
        </a>
    </div>
</div>
