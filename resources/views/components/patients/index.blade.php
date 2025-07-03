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
                <h2 class="text-2xl font-semibold leading-tight">Data Pasien</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <form action="/pasien" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
                    @csrf
                    <div class="block relative w-full">
                        <input name="search" placeholder="Cari nama..."
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <div class="flex ">
                        <button type="submit" class="btnSearch bg-green-500 hover:bg-green-900 text-white ml-2 py-2 px-2 rounded">Cari</button>
                    </div>
                </form>
                <div class="flex justify-end lg:w-1/2 md:w-full sm:w-full mb-1">
                    <a href="/pasien/create" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Pasien</a>            
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kode
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Alamat
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Jenis Kelamin
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tanggal Lahir
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Usia
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Golongan Darah
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kontak
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                            <tr colspan="8">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->kode }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->nama }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->alamat }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->jenis_kelamin }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->tanggal_lahir }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->usia }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->golongan_darah }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $patient->kontak }}
                                    </p>
                                </td>
                                <td class="px-8 py-8 border-b border-gray-200 bg-white">
                                    <a href="/pasien/{{ $patient->slug }}/edit" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 mt-1 rounded">Edit</a>
                                    <form onsubmit="return confirm('Hapus data?')" action="/pasien/{{ $patient->slug }}" method="POST" class="inline">
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
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>