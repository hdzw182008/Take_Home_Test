<x-app>
    <div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex flex-col md-w-1/2 h-auto ">
                <div class="flex w-full h-auto justify-center">
                    <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                            Edit Data Obat
                    </div>
                </div>
                <form action="/obat" method="POST">
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
                                <option value="{{ $id }}"  @if($medicine->signa_id == $id ) selected @endif>{{ $name }}</option>
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
        </div>
    </div>
</x-app>