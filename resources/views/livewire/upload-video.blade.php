<div>
    <x-mary-modal id="modal17">
        <x-mary-form wire:submit="submitForm">
           <x-mary-file wire:model="thumbnail" name="thumbnail" accept="image/png" crop-after-change>
                <img src="{{ $user->avatar ?? asset('thumbnails/placeholder.jpg') }}" class="h-40 rounded-lg" />
            </x-mary-file>

           <x-mary-file wire:model="video" name="video" label="Receipt" hint="Click to upload video" />

            <x-mary-input  wire:model="title" name="title" label="Title" placeholder="Title" />
            <br />
            <x-mary-input wire:model="description" name="description" label="Description" placeholder="Description" />
            <br />
            <x-mary-tags wire:model="tags" name="tags" label="Click or enter tag(s)" hint="Hint: Hit enter to create a new tag" />
            <x-slot:actions>
                <x-mary-button label="Cancel" onclick="modal17.close()" class="btn-ghost" />
                <x-mary-button type="submit" label="Submit" class="btn-success" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>