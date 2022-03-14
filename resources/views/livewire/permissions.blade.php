<div>
    @if ($createMode == true)
        @include('livewire.create')
    @elseif($createMode == false)
        @include('livewire.index')
    @endif
</div>
