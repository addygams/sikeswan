<x-app-layout>
    @if (session()->has('dashboard'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ session('dashboard') }}
        </h2>
    </x-slot>
    @endif
</x-app-layout>
