<div>
    @if ($createMode == true)
        @include('livewire.create')
    @elseif($updateMode == true)
        @include('livewire.edit')
    @elseif($createMode == false || $updateMode == false)
        @include('livewire.index')
    @endif
</div>
