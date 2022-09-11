
    @foreach ($annexes as $anexo)
    <div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
            <input id="bordered-radio-{{ $anexo->idAnnexes }}" type="radio" value="{{ $anexo->idAnnexes }}" name="annexes"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="bordered-radio-{{ $anexo->idAnnexes }}"
            class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
                {{ $anexo->problematic }}
            </label>
        @if ($anexo->note != null)
        <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: {{ $anexo->note }}</label>
        @endif
        
    </div>
@endforeach