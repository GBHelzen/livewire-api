@include ('components.layouts.app')

<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Título da Arte
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Dimensões
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Link
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Créditos
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            {{-- Título --}}
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $arte->title }} 
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            {{-- Dimensões --}}
            @if ($arte->dimensions == null)
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
                            <div> {{ $arte->dimensions }} </div>
                        </div>
                    </div>
                </div>
            </td>
            @endif
            {{-- Link --}}
            @if ($arte->url == null)
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"> Link indisponível </div>
                </td>   
            @else
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{$arte->url }}" class="text-sm text-blue-900" target="_blank"> {{$arte->url }} </a>
                </td>
            @endif
            {{-- Créditos --}}
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $arte->creditLine }} 
                            </div>
                        </div>
                    </div>
                </div>
            </td>

        </tr>

    </tbody>
</table>

<br>

{{-- Tabela de Artista que fizeram essa Arte --}}
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Artistas
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>

            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            @foreach ($arte->artistas as $artista)
                                    <div class="p-2 flex items-right">
                                        <a href="{{ route('artistas.show', $artista->constituentID) }}"> {{ $artista->displayName }} </a>
                                            <a href="{{ route('artistas.show', $artista->constituentID) }}" class="px-2">
                                                <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                    </path>
                                                    <polyline points="15 3 21 3 21 9">
                                                    </polyline>
                                                    <line x1="10" x2="21" y1="14" y2="3">
                                                    </line>
                                                </svg>
                                            </a>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
    <a href="{{ url()->previous() }}" type="button"
        class="float-left py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Voltar
    </a>
</div>