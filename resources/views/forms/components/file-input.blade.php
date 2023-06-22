<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
        <!-- Interact with the `state` property in Alpine.js -->
        <label class="border-2 border-gray-200 p-3 w-full block rounded cursor-pointer my-2" for="customFile" x-data="{ files: null }">
            <input type="file" class="sr-only" id="customFile" x-on:change="files = Object.values($event.target.files)" {{ $getExtraInputAttributeBag() }}>
            <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose single file...'"></span>
        </label>
    </div>
</x-dynamic-component>
