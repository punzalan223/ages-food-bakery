<?php

use Livewire\Volt\Component;

new class extends Component {
    
    public function logout()
    {
        Auth::logout();
 
        session()->invalidate();
        session()->regenerateToken();

        return $this->redirect(route('admin-login'), navigate: true);
    }
}; ?>

<div>
    <nav 
        x-data="{mobileMenu: false, profileMenu: false}"
        class="relative z-10 bg-transparent border-b border-opacity-25 border-slate-500 lg:border-none lg:bg-transparent"
    >
        <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
          <div class="relative flex items-center justify-between h-16 lg:border-b lg:border-slate-500">
            <div class="flex items-center px-2 lg:px-0">
              <div class="shrink-0">
                <img class="block w-auto h-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=teal&shade=400" alt="Your Company">
              </div>
              <div class="hidden lg:ml-6 lg:block lg:space-x-4">
                <div class="flex">
                  <!-- Current: "bg-black bg-opacity-25", Default: "hover:bg-slate-800" -->
                  <a wire:navigate href="{{ route('admin-dashboard') }}" class="{{ Route::is('admin-dashboard') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800' }} px-3 py-2 text-sm font-medium text-white  rounded-md">Dashboard</a>
                  <a wire:navigate href="{{ route('admin-layout') }}" class="{{ Route::is('admin-layout') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800' }} px-3 py-2 text-sm font-medium text-white  rounded-md">Layout</a>
                  <a wire:navigate href="{{ route('admin-inbox') }}" class="{{ Route::is('admin-inbox') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800' }} px-3 py-2 text-sm font-medium text-white  rounded-md">Inbox</a>
                </div>
              </div>
            </div>
            <div class="flex justify-center flex-1 px-2 lg:ml-6 lg:justify-end">
              <div class="w-full max-w-lg lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative text-slate-100 focus-within:text-gray-400">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input id="search" name="search" class="block w-full rounded-md border-0 bg-slate-700/50 py-1.5 pl-10 pr-3 text-white placeholder:text-slate-100 focus:bg-white focus:text-gray-900 focus:ring-0 focus:placeholder:text-gray-500 sm:text-sm/6" placeholder="Search" type="search">
                </div>
              </div>
            </div>
            <div class="flex lg:hidden">
              <!-- Mobile menu button -->
                <button 
                    type="button" 
                    class="relative inline-flex items-center justify-center p-2 rounded-md text-slate-200 hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false"
                    @click="mobileMenu = !mobileMenu"
                >
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Icon when menu is closed.
    
                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg :class="`${mobileMenu ? 'hidden' : 'block'} w-6 h-6  shrink-0`" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                    Icon when menu is open.
    
                    Menu open: "block", Menu closed: "hidden"
                        -->
                    <svg :class="`${mobileMenu ? 'block' : 'hidden'} w-6 h-6 shrink-0`" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:ml-4 lg:block">
              <div class="flex items-center">
                <button type="button" class="relative p-1 rounded-full shrink-0 text-slate-200 hover:bg-slate-800 hover:text-white focus:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">View notifications</span>
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                  </svg>
                </button>
  
                <!-- Profile dropdown -->
                <div class="relative ml-4 shrink-0">
                    <div>
                        <button 
                            type="button" 
                            class="relative flex text-sm text-white rounded-full focus:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900" id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                            @click="profileMenu = !profileMenu"
                        >
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                        </button>
                    </div>
                    <div 
                        x-show="profileMenu"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        x-cloak
                        @click.outside="profileMenu = false"
                        class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                    >
                        <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                        <a wire:navigate href="{{ route('admin-profile') }}" class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a wire:click="logout" class="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Mobile menu, show/hide based on menu state. -->
        <div 
            x-show="mobileMenu"
            class="bg-slate-900 lg:hidden" id="mobile-menu"
        >
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-black bg-opacity-25", Default: "hover:bg-slate-800" -->
                <a wire:navigate href="{{ route('admin-dashboard') }}" class="{{ Route::is('admin-dashboard') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800'  }} block px-3 py-2 text-base font-medium text-white rounded-md">Dashboard</a>
                <a wire:navigate href="{{ route('admin-layout') }}" class="{{ Route::is('admin-layout') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800'  }} block px-3 py-2 text-base font-medium text-white rounded-md">Layout</a>
                <a wire:navigate href="{{ route('admin-inbox') }}" class="{{ Route::is('admin-inbox') ? 'bg-black bg-opacity-25' : 'hover:bg-slate-800'  }} block px-3 py-2 text-base font-medium text-white rounded-md">Inbox</a>
            </div>
            <div class="pt-4 pb-3 border-t border-slate-800">
                <div class="flex items-center px-4">
                <div class="shrink-0">
                    <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=320&h=320&q=80" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">Debbie Lewis</div>
                    <div class="text-sm font-medium text-slate-200">debbielewis@example.com</div>
                </div>
                <button type="button" class="relative p-1 ml-auto rounded-full shrink-0 text-slate-200 hover:bg-slate-800 hover:text-white focus:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>
                </div>
                <div class="px-2 mt-3">
                <a href="#" class="block px-3 py-2 text-base font-medium rounded-md text-slate-200 hover:bg-slate-800 hover:text-white">Your Profile</a>
                <a href="#" class="block px-3 py-2 text-base font-medium rounded-md text-slate-200 hover:bg-slate-800 hover:text-white">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
</div>
