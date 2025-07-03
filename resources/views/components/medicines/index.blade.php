<x-app>
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
                <h2 class="text-2xl font-semibold leading-tight">Data Obat</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                  <form action="/obat" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
                    @csrf
                    <div class="block relative w-full">
                        <input name="search" placeholder="Cari nama obat..."
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <div class="flex ">
                        <button type="submit" class="btnSearch bg-green-500 hover:bg-green-900 text-white ml-2 py-2 px-2 rounded">Cari</button>
                    </div>
                </form>
                <div class="flex justify-end lg:w-1/2 md:w-full sm:w-full mb-1">
                    <a href="/obat/create" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Obat</a>            
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kode Obat
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Golongan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Dosis
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Signa
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Stok
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Satuan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kadaluarsa
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($medicines as $medicine)
                            <tr colspan="8">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->kode }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->nama }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->golongan }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->dosis }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->signaObats->signa }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->stok }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->satuan }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $medicine->kadaluarsa }}
                                    </p>
                                </td>
                                <td class="px-8 py-8 border-b border-gray-200 bg-white">
                                    <a href="/obat/{{ $medicine->slug }}/edit" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 mt-1 rounded">Edit</a>
                                    <form onsubmit="return confirm('Hapus data?')" action="/obat/{{ $medicine->slug }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-800 hover:bg-red-700 text-white py-1 px-1 mt-1 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
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
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="inline-flex mt-2 xs:mt-0">
                            {{ $medicines->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>