<x-app>
    <div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex flex-col md-w-1/2 h-auto ">
                <div class="flex w-full h-auto justify-center">
                    <div class="flex w-10/12 h-auto py-3 justify-center medicines-center text-2xl font-bold">
                            Edit Data Obat Racikan
                    </div>
                </div>

                <form class="bg-white py-2 px-4 rounded">
                        <label class="block text-sm/6 font-medium text-gray-900">Kode Obat Racikan</label>
                        <div class="mt-2">
                            <input type="text" name="kode" autocomplete="given-name" value="{{ $kode }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" readonly/>
                        <label class="block text-sm/6 font-medium text-gray-900">Nama Racikan</label>
                        <div class="mt-2">
                            <input type="text" name="nama" autocomplete="given-name" value="{{ $nama ?? old('nama') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('nama') border-2 border-red-500 @enderror" />
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
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $medicine as $item )
                                            
                                            <tr class="border-1">
                                                <td><input type="hidden" readonly name="id_obat" value="{{ $item->obat_id }}">{{ $item->obat_id }}</td>
                                                <td>{{ $item->obatt[0]->nama }}</td>
                                                <td><input type="number" placeholder="Qty..." value="{{ $item->qty ?? old('qty')}}" name="qty"></td>
                                                <td>
                                                    <select name="signa_id" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                                                        @foreach ($signa as $id => $name)
                                                            <option value="{{ $id }}" @if($item->signa_id == $id ) selected @endif>{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <form action="/obatRacik/{{ $item->obat_id }}/hapus" method="post" onsubmit="return confirm('Yakin dihapus??')">
                                                <td>
                                                        @method('DELETE')
                                                        @csrf
                                                        <button submit="submit" class="bg-red-800 hover:bg-red-700 text-white py-1 px-1 mt-1 rounded">Hapus</button>
                                                    </td>
                                                </form>
                                            </tr>

                                        @endforeach
                                        
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
                    <form action="/obatRacik/create/edit" method="post" id="addMedicine">
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
                            @foreach ( $medicines as $medic)
                                
                            <tr class="border-1">
                                <td><input type="hidden" value="{{ $kode }}" name="kode">
                                    <input type="hidden" value="{{ $nama }}" name="nama">
                                    <input type="checkbox" value="{{ $medic->id }}" name="id[]" id="cek{{ $i }}"></td>
                                <td><label for="cek{{ $i }}">{{ $medic->nama }}</label></td>
                                <td><label for="cek{{ $i }}">{{ $medic->golongan }}</label></td>
                                <td><label for="cek{{ $i }}">{{ $medic->dosis }}</label></td>
                                <td><label for="cek{{ $i }}">{{ $medic->kadaluarsa }}</label></td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>