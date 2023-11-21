<div>
    @include('livewire.utilities.alerts')
    <x-slot name="header">
        <div class="section-header">
            <h1>User Management</h1>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h4>Edit User Data</h4>
        </div>
        <div class="card-body">
            <!-- Name -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="form-group">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="$name" wire:model="name" />

            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="$email" wire:model='email' />
            </div>

            <x-button type='submit' wire:click='editUser'>
                {{ __('Edit') }}
            </x-button>
        </div>
    </div>
</div>
