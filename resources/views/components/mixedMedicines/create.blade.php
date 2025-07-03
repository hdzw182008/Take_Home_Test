<x-app>
    <div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex flex-col md-w-1/2 h-auto ">
                <div class="flex w-full h-auto justify-center">
                    <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                            Tambah Data Obat Racikan
                    </div>
                </div>
                <form action="/obatRacik" method="POST" class="bg-white py-2 px-4 rounded">
                    @csrf
                        <div class="flex w-full justify-end">
                            <button type="submit" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 mb-2 rounded">Simpan Racikan</button>
                        </div>
                        <label class="block text-sm/6 font-medium text-gray-900">Kode Obat Racikan</label>
                        <div class="mt-2">
                            <input type="text" name="kode" autocomplete="given-name" value="{{ $kode }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" readonly/>
                        <label class="block text-sm/6 font-medium text-gray-900">Nama Racikan</label>
                        <div class="mt-2">
                            <input type="text" name="nama" autocomplete="given-name" value="{{ old('nama') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('nama') border-2 border-red-500 @enderror" />
                             @error('nama')
                                <small class="mt-0 mb-2">{{$message}}</small>
                            @enderror
                        </div>
                        <label class="block text-sm/6 font-medium text-gray-900">Obat Racikan</label>
                        <div class="mt-2">
                            <div class="flex w-full ">
                                <table class="w-full border-2 ml-2 text-center">
                                    <thead>
                                        <tr class="border-1">
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Signa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($certainMedicine as $item)
                                            <tr class="border-1">
                                                <td><input type="hidden" name="id_obat[]" value="{{ $item->id_obat }}">
                                                    {{ $item->id }}</td>
                                                <td>{{ $item->nama_obat }}</td>
                                                <td><input type="number" class="@error('nama') border-2 border-red-500 @enderror" placeholder="Qty..." value="{{ $item->qty ?? old('qty')}}" name="qty[]">
                                                 @error('qty')
                                                    <small class="mt-0 mb-2">{{$message}}</small>
                                                @enderror
                                                </td>
                                                <td>
                                                    <select name="signa_id[]" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                                                        @foreach ($signa as $id => $name)
                                                            <option value="{{ $id }}" @if($item->signa == $id ) selected @endif>{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="border-1">
                                                <td colspan="4">Not found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </form>
                <hr class="mt-8">
                <div class="mt-8">
                    <div class="my-2 flex sm:flex-row flex-col">
                            <form action="/obatRacik/create" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
                                @csrf
                                <div class="block relative w-full">
                                    <input type="text" name="search" placeholder="Cari obat racikan..."
                                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                </div>
                                <div class="flex ">
                                    <button type="submit" class="btnSearch bg-green-500 hover:bg-green-900 text-white ml-2 py-2 px-2 rounded">Cari</button>
                                </div>
                            </form>
                            <div class="flex justify-end lg:w-1/2 md:w-full sm:w-full mb-1">
                                <a href="/certain" onclick="event.preventDefault(); document.getElementById('addMedicine').submit();" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Racikan</a>            
                            </div>
                        </div>
                    <form action="/certain" method="POST" id="addMedicine">
                    @csrf
                    <table class="w-full border-2 ml-2 text-center">
                        <thead>
                            <tr class="border-1">
                                <th>Pilih</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Dosis</th>
                                <th>Kadaluarsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @forelse ($medicines as $medicine)
                                <tr class="border-1">
                                    <td><input type="checkbox" value="{{ $medicine->id }}" name="id[]" id="cek{{ $i }}"></td>
                                    <td><label for="cek{{ $i }}">{{ $medicine->nama }}</label></td>
                                    <td><label for="cek{{ $i }}">{{ $medicine->golongan }}</label></td>
                                    <td><label for="cek{{ $i }}">{{ $medicine->dosis }}</label></td>
                                    <td><label for="cek{{ $i }}">{{ $medicine->kadaluarsa }}</label></td>
                                </tr>
                                <?php $i++?>
                            @empty
                                <tr class="border-1">
                                    <td colspan="4">Not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>