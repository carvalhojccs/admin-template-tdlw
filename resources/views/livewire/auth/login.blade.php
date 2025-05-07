<div>
    <x-img.logo />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
    <!-- Form -->
    <form wire:submit='login'>
        <div class="space-y-4">
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" autofocus wire:model='email'/>
            </div>
            <div>
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" type="password" name="password"  autocomplete="current-password"  wire:model='password'/>
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <div class="mr-1">
                    <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                </div>
            @endif
            <x-button class="ml-3">
                {{ __('Entrar') }}
            </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <!-- Warning -->
        <div class="mt-5">
            <div class="bg-yellow-500/20 text-yellow-700 px-3 py-2 rounded-lg justify-center flex items-center">
                <span class="text-sm">
                    ZAMED SAUDELOG
                </span>
            </div>
        </div>
    </div>
</div>
