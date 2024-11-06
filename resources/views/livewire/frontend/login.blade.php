<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.app')]
#[Title('Ages Food Bakery - Login')] 
class extends Component {
    
    public $email = '';
    public $password = '';
    

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Regenerate the session
            session()->regenerate();

            // Redirect to admin dashboard
            return $this->redirect(route('admin-dashboard'), navigate: true);
        } else {
            $this->addError('email', 'The provided credentials do not match our records.');
            $this->reset('password');
        }
}

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    
}; ?>

<div class="flex flex-col justify-center min-h-full px-5 py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="w-auto h-10 mx-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=slate&shade=600" alt="Your Company">
      <h2 class="mt-6 font-bold tracking-tight text-center text-gray-900 text-2xl/9">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <div class="px-6 py-12 bg-white shadow sm:rounded-lg sm:px-12">
            <form 
                class="space-y-6"
                wire:submit="login"
            >
                <div>
                    <label for="email" class="block font-medium text-gray-900 text-base/6">Email address</label>
                    <input 
                        class="mt-2 h-10 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-600 sm:text-base/6"
                        id="email" 
                        name="email" 
                        wire:model="email"
                    >
                    @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
        
                <div class="space-y-2">
                    <label for="password" class="block font-medium text-gray-900 text-base/6">Password</label>
                    <input 
                        class="h-10 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-600 sm:text-base/6"
                        id="password" 
                        type="password"
                        autocomplete="password"
                        wire:model="password"
                    >
                    @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
        
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="w-4 h-4 border-gray-300 rounded text-slate-600 focus:ring-slate-600">
                    <label for="remember-me" class="block ml-3 text-gray-900 text-base/6">Remember me</label>
                    </div>
        
                    <div class="text-base/6">
                    <a href="#" class="font-semibold text-slate-600 hover:text-slate-500">Forgot password?</a>
                    </div>
                </div>
        
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-slate-600 px-3 py-2.5 text-base/6 font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600">Sign in</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  