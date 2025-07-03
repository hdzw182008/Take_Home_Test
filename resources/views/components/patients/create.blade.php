<x-app>
    <div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="flex flex-col md-w-1/2 h-auto ">
                <div class="flex w-full h-auto justify-center">
                    <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                            Tambah Data Pasien
                    </div>
                </div>
                <form action="/pasien" method="POST">
                    @csrf
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Kode Pasien</label>
                        <div class="mt-2">
                            <input type="text" name="kode" autocomplete="given-name" value="{{ $kode }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" readonly/>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                        <div class="mt-2">
                            <input type="text" name="nama" autocomplete="given-name" value="{{ old('nama') }}" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('nama') border-2 border-red-500 @enderror" />
                             @error('nama')
                                <small class="mt-0 mb-2">{{$message}}</small>
                            @enderror
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Alamat</label>
                        <div class="mt-2">
                            <textarea name="alamat" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('alamat') border-2 border-red-500 @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <small class="mt-0 mb-2">{{$message}}</small>
                            @enderror
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Tanggal Lahir</label>
                        <div class="mt-2">
                            <input type="date" value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('tanggal_lahir') border-2 border-red-500 @enderror" />
                            @error('tanggal_lahir')
                                <small class="mt-0 mb-2">{{$message}}</small>
                            @enderror
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Jenis Kelamin</label>
                        <div class="mt-2">
                            <select name="jenis_kelamin" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Usia</label>
                        <div class="mt-2">
                            <select name="usia" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 " >
                                <option value="Anak-anak">Anak-anak</option>
                                <option value="Dewasa">Dewasa</option>
                                <option value="Lansia">Lanjut Usia</option>
                            </select>
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Golongan Darah</label>
                        <div class="mt-2">
                            <select name="golongan_darah" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 " >
                                <option value="None">Belum diketahui</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Kontak</label>
                        <div class="mt-2">
                            <input type="number" value="{{ old('kontak') }}" name="kontak" autocomplete="given-name" class="w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 @error('kontak') border-2 border-red-500 @enderror" />
                            @error('kontak')
                                <small class="mt-0 mb-2">{{$message}}</small>
                            @enderror
                        </div>
                    <button type="submit" id="btn" class="bg-blue-800 hover:bg-blue-700 text-white py-2 px-4 mt-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app>