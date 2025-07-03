<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

    <div class="container mx-auto px-4 sm:px-8">
        @if (session()->has('success'))
        <div role="alert" class="mt-3 relative flex w-full p-3 text-sm text-white bg-green-600 rounded-md" id="alert">
                  {{ session('success') }}
            <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" type="button" onclick="return this.parentNode.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>
        @endif
        @if (session()->has('gagal'))
        <div role="alert" class="mt-3 relative flex w-full p-3 text-sm text-white bg-red-600 rounded-md" id="alert">
                  {{ session('gagal') }}
            <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" type="button" onclick="return this.parentNode.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>
        @endif
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Data Obat Racikan</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block w-full shadow rounded-lg overflow-hidden overflow-y-scroll h-screen">
                    <table border="2" class="w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kode Obat Racikan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Obat Racikan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Obat
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Qty
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Signa
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $previous = null;
                                $index = 0;
                            @endphp

                            @forelse ($data as $medicine)
                            @if($index == 0 && $medicine->kode != $previous)
                                @php
                                    $rowspan = $medicine->where('kode', $medicine->kode)->count();
                                    $previous = $medicine->kode;
                                @endphp
                                <tr class="border-2">
                                    <td rowspan="{{ $rowspan }}" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->kode }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td rowspan="{{ $rowspan }}" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->nama }}
                                        </p>
                                    </td>

                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->obatt[0]->nama }}
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->qty }}
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->signa->signa }}
                                        </p>
                                    </td>
                                </tr>    
                            @else
                                <tr class="border-2">    
                                     <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->obatt[0]->nama }}
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->qty }}
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $medicine->signa->signa }}
                                        </p>
                                    </td>
                                </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="8" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-9">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                Not Found
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div
                        class="px-3 py-1 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="inline-flex mt-2 xs:mt-0">
                            {{-- {{ $medicines->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>