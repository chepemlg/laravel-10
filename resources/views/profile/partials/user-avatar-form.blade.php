<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Avatar') }}
        </h2>
    </header>
    
    <img style="width: 25%; height: 25%; border-radius: 50%" src="{{ "storage/$user->avatar" }}" alt="User Avatar">

    <form action="{{ route('profile.avatar.ai') }}" method="post" class="mt-4">
        @csrf
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Generate Avatar from AI") }}
        </p>
        <x-primary-button>{{ __('Generate Avatar') }}</x-primary-button>
    </form>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __("Or") }}
    </p>

    @if (session('message'))
    <div style="color:red">
        {{ session('message') }}
    </div>
    @endif

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        
        <div>
            <x-input-label for="avatar" :value="__('Upload Avatar from PC')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        
        
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
