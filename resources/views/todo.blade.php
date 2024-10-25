<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('My To-Do List') }}
</h2>
</x-slot>
<div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
<div class="bg-red-100 overflow-hidden shadow-xl sm:rounded-lg">
create a new ToDo
</div>
</div>
</div>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-red-100 overflow-hidden shadow-xl sm:rounded-lg">
Affichage des ToDo
</div>
</div>
</div>
</x-app-layout>