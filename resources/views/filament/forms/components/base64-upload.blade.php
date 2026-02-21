<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <input type="file" accept="image/*"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
            @change="
                let file = $event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = (e) => { state = e.target.result; };
                    reader.readAsDataURL(file);
                }
            ">

        <template x-if="state && state.startsWith('data:image')">
            <div class="mt-6">
                <p class="text-sm text-gray-400 mb-2 font-medium">New Image Preview:</p>
                <img :src="state"
                    class="max-h-80 w-auto max-w-md object-contain rounded-xl border-2 border-primary-500 shadow-md"
                    alt="Preview">
            </div>
        </template>

        @if ($getRecord() && $getRecord()->thumbnail)
            <template x-if="!state || !state.startsWith('data:image')">
                <div class="mt-6">
                    <p class="text-sm text-gray-400 mb-2 font-medium">Current Image:</p>
                    <img src="{{ $getRecord()->thumbnail }}"
                        class="max-h-80 w-auto max-w-md object-contain rounded-xl border border-gray-300 shadow-md"
                        alt="Current Thumbnail">
                </div>
            </template>
        @endif
    </div>
</x-dynamic-component>
