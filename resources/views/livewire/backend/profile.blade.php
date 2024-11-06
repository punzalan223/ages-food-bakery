<?php

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app-backend')]
#[Title('Ages Food Bakery - Profile')] 
class extends Component {

    public $user;
    #[Validate('required|min:3')] 
    public $first_name;
    #[Validate('required|min:3')] 
    public $last_name;
    #[Validate('required|email')] 
    public $email;

    public $current_password;
    public $password;
    public $password_confirmation;
    
    public function mount()
    {
        $this->user = User::find(auth()->id());
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
    }

    public function editProfile()
    {
        $this->validate();
        
        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ]);

        $this->dispatch('alert', ['message' => 'personal information']);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            return;
        }

        // Update the password
        auth()->user()->update([
            'password' => $this->password,
        ]);
        
        $this->reset(['current_password', 'password', 'password_confirmation']);

        $this->dispatch('alert', ['message' => 'passsword']);
    }
    
}; ?>

<div>
    <main class="">
        <h1 class="sr-only">Account Settings</h1>
  
        <!-- Settings forms -->
        <div class="divide-y divide-white/5">
            <div class="grid grid-cols-1 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3">
                <div>
                <h2 class="font-semibold text-gray-600 text-base/7">Personal Information</h2>
                <p class="mt-1 text-gray-600 text-base/6">Edit your personal information here.</p>
                </div>
    
                <form 
                    class="md:col-span-2"
                    wire:submit="editProfile"
                >
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block font-medium text-gray-600 text-base/6">First name</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    type="text" 
                                    id="first-name" 
                                    autocomplete="given-name" 
                                    wire:model="first_name"
                                >
                            </div>
                            @error('first_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
        
                        <div class="sm:col-span-3">
                            <label for="last-name" class="block font-medium text-gray-600 text-base/6">Last name</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    type="text" 
                                    id="last-name"
                                    autocomplete="family-name" 
                                    wire:model="last_name"
                                >
                            </div>
                            @error('last_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
        
                        <div class="col-span-full">
                            <label for="email" class="block font-medium text-gray-600 text-base/6">Email address</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    id="email" 
                                    type="email"
                                    autocomplete="email" 
                                    wire:model="email"
                                >
                            </div>
                            @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
        
                    <div class="flex mt-8">
                        <button type="submit" class="px-3 py-2 text-base font-semibold text-white rounded-md shadow-sm bg-slate-600 hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-500">Save</button>
                    </div>
                </form>
            </div>
  
            <div class="grid grid-cols-1 px-4 py-16 max-w-7xl gap-x-8 gap-y-10 sm:px-6 md:grid-cols-3 lg:px-8">
                <div>
                <h2 class="font-semibold text-gray-600 text-base/7">Change password</h2>
                <p class="mt-1 text-gray-600 text-base/6">Update your password associated with your account.</p>
                </div>
    
                <form 
                    class="md:col-span-2"
                    wire:submit="changePassword"
                >
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="current-password" class="block font-medium text-gray-600 text-base/6">Current password</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    id="current-password" 
                                    type="password" 
                                    autocomplete="current-password" 
                                    wire:model="current_password"
                                >
                            </div>
                            @error('current_password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
        
                        <div class="col-span-full">
                            <label for="new-password" class="block font-medium text-gray-600 text-base/6">New password</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    id="new-password" 
                                    type="password" 
                                    autocomplete="new-password" 
                                    wire:model="password"
                                >
                            </div>
                            @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
        
                        <div class="col-span-full">
                            <label for="confirm-password" class="block font-medium text-gray-600 text-base/6">Confirm password</label>
                            <div class="mt-2">
                                <input 
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-slate-300 focus:ring-2 focus:ring-inset focus:ring-sky-500 sm:text-base/6"
                                    id="confirm-password" 
                                    type="password" 
                                    autocomplete="new-password" 
                                    wire:model="password_confirmation"
                                >
                            </div>
                            @error('password_confirmation') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
    
                    <div class="flex mt-8">
                        <button type="submit" class="px-3 py-2 text-base font-semibold text-white rounded-md shadow-sm bg-slate-600 hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-500">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div 
        x-data="{showAlert: false, message: ''}"
        x-on:alert.window="showAlert = true; message = `You have successfully updated ${$event.detail[0].message}.`"
        class="fixed bottom-5 right-10"
    >
        <div 
            class="space-y-5"
            x-show="showAlert"
            x-effect="if (showAlert) setTimeout(() => showAlert = false, 3000)"
            x-transition
        >
            <div class="p-4 border-t-2 border-teal-500 rounded-lg bg-teal-50" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                <div class="flex">
                    <div class="shrink-0">
                        <!-- Icon -->
                        <span class="inline-flex items-center justify-center text-teal-800 bg-teal-200 border-4 border-teal-100 rounded-full size-8">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                        <h3 id="hs-bordered-success-style-label" class="font-semibold text-gray-800">
                            Successfully updated.
                        </h3>
                        <p class="text-sm text-gray-700" x-text="message">
                        </p>
                    </div>
                </div>
            </div>
          
            {{-- <div class="p-4 border-red-500 bg-red-50 border-s-4" role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
              <div class="flex">
                <div class="shrink-0">
                  <!-- Icon -->
                  <span class="inline-flex items-center justify-center text-red-800 bg-red-200 border-4 border-red-100 rounded-full size-8">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 6 6 18"></path>
                      <path d="m6 6 12 12"></path>
                    </svg>
                  </span>
                  <!-- End Icon -->
                </div>
                <div class="ms-3">
                  <h3 id="hs-bordered-red-style-label" class="font-semibold text-gray-800">
                    Error!
                  </h3>
                  <p class="text-sm text-gray-700">
                    Your purchase has been declined.
                  </p>
                </div>
              </div>
            </div>
          </div> --}}
    </div>
</div>
