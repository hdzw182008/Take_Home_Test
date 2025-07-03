<x-app>
    <div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex flex-col md-w-1/2 h-auto ">
                <div class="flex w-full h-auto justify-center">
                    <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                            Tambah Data Resep
                    </div>
                </div>
                <form action="" method="POST" class="bg-white py-2 px-4 rounded">
                    @csrf
                        <div class="flex w-full justify-end">
                            <button type="submit" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 mb-2 rounded">Simpan Resep</button>
                        </div>
                        <label class="text-sm/6 font-medium text-gray-900">Kode Resep</label>
                        <input type="text" name="kode" readonly autocomplete="given-name" value="{{ $kode }}" class="rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" readonly/>
                    <div class="mt-2 bg-white rounded">
                    <hr class="mt-8">
                    <label class="block text-sm/6 font-medium text-gray-900">Resep Obat</label>
                        <div class="mt-2">
                            <div class="flex w-full ">
                                <table class="w-full border-2 ml-2 text-center">
                                    <thead>
                                        <tr class="border-1">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Items</th>
                                            <th>Qty</th>
                                            <th>Signa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0
                                        @endphp
                                        @forelse ($resepSementara as $item)
                                            <tr class="border-1">
                                                <td>{{ $i }}</td>
                                                <td><input type="hidden" name="id_obat[]" value="{{ $item->id_obat }}">
                                                    {{ $item->name}}
                                                </td>
                                                @if($item->type_obat == 'racik')
                                                <td>
                                                    {{$item->obatRacik->nama }}    
                                                </td>
                                                @else
                                                <td>
                                                    {{ '-'}}
                                                </td>
                                                @endif
                                                <td><input type="number" class="@error('nama') border-2 border-red-500 @enderror" placeholder="Qty..." value="{{ $item->qty ?? old('qty')}}" name="qty[]">
                                                     @error('qty')
                                                        <small class="mt-0 mb-2">{{$message}}</small>
                                                     @enderror
                                                </td>
                                                <td>
                                                    <select name="signa_id[]" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                                                        @foreach ($signa as $id => $name)
                                                            <option value="{{ $id }}" @if($item->signa_id == $id ) selected @endif>{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @php
                                            $i++
                                        @endphp
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

                        <div class="mt-2 w-full flex">
                            <span class="w-1/2 sm:w-full">
                                <h4>Tambah Obat: </h4>
                                <button onclick="document.getElementById('obat').removeAttribute('hidden');" type="button" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 mb-2 rounded">Obat Baru</button>
                                <button onclick="document.getElementById('obatNonRacik').removeAttribute('hidden');" type="button" id="btn" class="bg-green-800 hover:bg-green-700 text-white py-1 px-4 mb-2 rounded">Pilih Obat</button>
                            </span>
                            <span class="w-1/2 sm:2-full justify-end">
                                <h4>Tambah Obat Racikan: </h4>
                                <a href="/racikanBaru" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 mb-2 rounded">Racikan Baru</a>
                                <button onclick="document.getElementById('obatRacik').removeAttribute('hidden');" type="button" id="btn" class="bg-green-800 hover:bg-green-700 text-white py-1 px-4 mb-2 rounded">Pilih Racikan</button>
                            </span>
                        </div>
                        <div class="mt-2">
                            <form action="/obatBaru" method="POST" id="obat" hidden>
                                @csrf
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Kode Obat</label>
                                    <div class="mt-2">
                                        <input type="text" name="kode" autocomplete="given-name" value="{{ $kode }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" readonly/>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                                    <div class="mt-2">
                                        <input type="text" name="nama" autocomplete="given-name" value="{{ old('nama') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('nama') border-2 border-red-500 @enderror" />
                                        @error('nama')
                                            <small class="mt-0 mb-2">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Golongan</label>
                                    <div class="mt-2">
                                        <input type="text" name="golongan" autocomplete="given-name" value="{{ old('golongan') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('golongan') border-2 border-red-500 @enderror" />
                                        @error('golongan')
                                            <small class="mt-0 mb-2">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Dosis</label>
                                    <div class="mt-2">
                                        <input type="text" name="dosis" autocomplete="given-name" value="{{ old('dosis') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('dosis') border-2 border-red-500 @enderror" />
                                        @error('dosis')
                                            <small class="mt-0 mb-2">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Stok</label>
                                    <div class="mt-2">
                                        <input type="number" name="stok" autocomplete="given-name" value="{{ old('stok') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('stok') border-2 border-red-500 @enderror" />
                                        @error('stok')
                                            <small class="mt-0 mb-2">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Satuan</label>
                                    <div class="mt-2">
                                        <select name="satuan" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                                            <option value="Sirup">Sirup</option>
                                            <option value="Kapsul">Kapsul</option>
                                            <option value="Tablet">Tablet</option>
                                        </select>
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Signa</label>
                                    <div class="mt-2">
                                        <select name="signa_id" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" onmousedown="if(this.options.length>10){this.size=10;}" onchange="this.blur()"  onblur="this.size=0;">
                                        @foreach ($signa as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Kadaluarsa</label>
                                    <div class="mt-2">
                                        <input type="date" value="{{ old('kadaluarsa') }}" name="kadaluarsa" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('kadaluarsa') border-2 border-red-500 @enderror" />
                                        @error('kadaluarsa')
                                            <small class="mt-0 mb-2">{{$message}}</small>
                                        @enderror
                                    </div>
                                <button type="submit" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded">Simpan</button>
                            </form>
                        </div>


                <div class="mt-8" id="obatNonRacik" hidden>
                    <div class="my-2 flex sm:flex-row flex-col">
                            <form action="/resep" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
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
                                <a href="/certainResep" onclick="event.preventDefault(); document.getElementById('addMedicine').submit();" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Obat</a>            
                            </div>
                        </div>
                    <form action="/certainObat/create" method="POST" id="addMedicine">
                    @csrf
                    <h4 class="text-center">Pilih Obat</h4>
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
                            @forelse ($obatData as $medicine)
                                <tr class="border-1">
                                    <td><input type="checkbox" value="{{ $medicine->id }}" name="ids[]" id="cekk{{ $i }}"></td>
                                    <td><label for="cekk{{ $i }}">{{ $medicine->nama }}</label></td>
                                    <td><label for="cekk{{ $i }}">{{ $medicine->golongan }}</label></td>
                                    <td><label for="cekk{{ $i }}">{{ $medicine->dosis }}</label></td>
                                    <td><label for="cekk{{ $i }}">{{ $medicine->kadaluarsa }}</label></td>
                                </tr>
                                <?php $i++?>
                            @empty
                                <tr class="border-1">
                                    <td colspan="4">Not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $obatData->links() }}
                    </form>
                </div>


                <div class="mt-8" id="obatRacik" hidden>
                    <div class="my-2 flex sm:flex-row flex-col">
                            <form action="/obatNonRacik/create" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
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
                                <a href="/certainResep" onclick="event.preventDefault(); document.getElementById('addMedicine').submit();" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Racikan</a>            
                            </div>
                        </div>
                    <form action="/certain" method="POST" id="addMedicine">
                    @csrf
                    <h4 class="text-center">Pilih Obat Racikan</h4>
                    <table class="w-full border-2 ml-2 text-center">
                        <thead>
                            <tr class="border-1">
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Signa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $previous = null;
                                $index = 0;
                                $i= 0;
                            @endphp

                            @forelse ($mixObatData as $medicine)
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
                                                    <input type="checkbox" value="{{ $medicine->kode }}" name="kode[]" id="ceks{{ $i }}">
                                                    {{ $medicine->kode }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td rowspan="{{ $rowspan }}" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->nama }}</label>
                                        </p>
                                    </td>

                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->obatt[0]->nama }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->qty }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->satuan }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->signa->signa }}</label>
                                        </p>
                                    </td>
                                </tr>    
                            @else
                                <tr class="border-2">    
                                     <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->obatt[0]->nama }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->qty }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->satuan }}</label>
                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <label for="ceks{{ $i }}">{{ $medicine->signa->signa }}</label>
                                        </p>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
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
                    {{ $mixObatData->links() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>