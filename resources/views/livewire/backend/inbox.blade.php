<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app-backend')]
#[Title('Ages Food Bakery - Inbox')] 
class extends Component {
    //
}; ?>

<div>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
        <div class="p-4 rounded-full bg-slate-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-600 size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
            </svg>
        </div>
        <input type="text" placeholder="Search..." class="mt-2 block rounded-md border-0 px-3 py-2.5  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:border-0 focus:ring-2 focus:ring-inset focus:ring-sky-600">
    </div>
    <div class="grid gap-8">
        <div class="border border-gray-300 rounded-2xl">
            <div class="p-8">
                <div class="flex flex-wrap justify-between">
                    <p class="max-w-2xl font-semibold text-gray-600 text-base/7 line-clamp-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error voluptates ea qui vel in ut assumenda labore harum sint maiores.</p>
                    <p class="text-gray-500">January 14, 2025 01:03 AM</p>
                </div>
                <p class="mt-4 text-gray-600 text-base/6 line-clamp-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod quidem, unde deleniti tenetur reiciendis enim explicabo earum, laboriosam nulla, id ad praesentium distinctio! Facere dicta minus ipsum expedita aliquam repellendus delectus pariatur, quisquam repudiandae commodi, sapiente exercitationem laborum neque suscipit necessitatibus! Eius, commodi vitae odit tempore voluptate corporis? Repellat, culpa?</p>
            </div>
        </div>
    </div>
</div>
