<div class="flex flex-col py-4">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="pb-8 items-center lg:flex-row  flex-col">
                <div class="grid grid-cols-3 gap-1">
                    {{-- Barra de pesquisa (filtro de artes por nome) --}}
                    <div class="col-span-1 px-4">
                        <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Nome da Arte</label>
                        <input wire:model.live="search" type="text" placeholder="Pesquise pela arte" class="w-full sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Artes
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Medium
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Departamento
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($artes as $arte)
                        <tr>
                            {{-- Título --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{ route('artes.show', $arte->objectID) }}">{{ $arte->title }}</a>
                                        </div>
                                        <div class="text-sm font-medium text-gray-500">
                                            <div>{{ $arte->classification }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- Medium --}}
                            @if ($arte->medium == null)
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <div> Sem informação </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @else
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <div> {{ $arte->medium }} </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endif
                            {{-- Departamento --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            <div> {{ $arte->department }} </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>

    <div class="col-span-1 px-4"> 
        {{ $artes->links() }} 
    </div>
</div>