<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app-backend')]
#[Title('Ages Food Bakery - Dashboard')] 
class extends Component {
    //
}; ?>

<div>
    <div class="">
        <h2 class="font-bold text-slate-900 text-lg/6">Overview</h2>
        <div class="grid my-4 md:grid-cols-2 xl:grid-cols-3">
            <div class="overflow-hidden bg-white border rounded-lg border-neutral-200">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="p-4 rounded-full bg-slate-100 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-600 size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                            </svg>
                        </div>
                        <div class="flex-1 w-0 ml-5">
                            <dl>
                            <dt class="font-medium text-gray-500 truncate text">Number of emails</dt>
                            <dd>
                                <div class="text-2xl font-medium text-gray-900/90">120</div>
                            </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 bg-gray-50">
                    <div class="text-base">
                    <a href="#" class="font-medium text-sky-700 hover:text-sky-900">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
