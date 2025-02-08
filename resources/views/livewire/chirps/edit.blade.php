<?php

use function Livewire\Volt\{mount, rules, state};

state(['chirp', 'message']);

rules(['message' => 'required|string|max:255']);

mount(fn () => $this->message = $this->chirp->message);

$update = function () {
    $this->autorize('update', $this->chirp);

    $validate = $this->validate();

    $this->chirp->update($validate);

    $this->dispatch('chirp-update');
};

$cancel = fn() => $this->dispatch('chirp-edit-canceled');
?>

<div>
    <form wire:submit="update"> 

        <textarea

            wire:model="message"

            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"

        ></textarea>
        
        <x-input-error :messages="$errors->get('message')" class="mt-2" />

        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>

        <x-secondary-button class="mt-4" wire:click.prevent="cancel">Cancel</x-secondary-button>

    </form> 
</div>
