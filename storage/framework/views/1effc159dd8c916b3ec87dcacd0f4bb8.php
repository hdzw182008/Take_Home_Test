<?php if (isset($component)) { $__componentOriginal7ae6b45c011e855a5545a671a7f3568e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ae6b45c011e855a5545a671a7f3568e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container mx-auto px-4 sm:px-8">
        <?php if(session()->has('success')): ?>
        <div role="alert" class="mt-3 relative flex w-full p-3 text-sm text-white bg-green-600 rounded-md" id="alert">
                  <?php echo e(session('success')); ?>

            <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" type="button" onclick="return this.parentNode.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>
        <?php endif; ?>
        <?php if(session()->has('gagal')): ?>
        <div role="alert" class="mt-3 relative flex w-full p-3 text-sm text-white bg-red-600 rounded-md" id="alert">
                  <?php echo e(session('gagal')); ?>

            <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-white hover:bg-white/10 active:bg-white/10 absolute top-1.5 right-1.5" type="button" onclick="return this.parentNode.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        </div>
        <?php endif; ?>
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Data Obat Racikan</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                  <form action="/obatRacik" method="GET" class="lg:w-1/2 md:w-full sm:w-full flex mb-1">
                    <?php echo csrf_field(); ?>
                    <div class="block relative w-full">
                        <input name="search" placeholder="Cari obat racikan..."
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <div class="flex ">
                        <button type="submit" class="btnSearch bg-green-500 hover:bg-green-900 text-white ml-2 py-2 px-2 rounded">Cari</button>
                    </div>
                </form>
                <div class="flex justify-end lg:w-1/2 md:w-full sm:w-full mb-1">
                   <a href="/cetak}}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-2 mr-2 rounded">Cetak</a>
                    <a href="/obatRacik/create" class="btnAdd bg-blue-500 hover:bg-blue-700 text-white mr-2 py-2 px-2 rounded">Tambah Racikan</a>            
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block w-full shadow rounded-lg overflow-hidden overflow-y-scroll h-screen">
                    <table class="w-full">
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
                                    Satuan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Signa
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $previous = null;
                                $index = 0;
                            ?>

                            <?php $__empty_1 = true; $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($index == 0 && $medicine->kode != $previous): ?>
                                <?php
                                    $rowspan = $medicine->where('kode', $medicine->kode)->count();
                                    $previous = $medicine->kode;
                                ?>
                                <tr class="border-2">
                                    <td rowspan="<?php echo e($rowspan); ?>" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->kode); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td rowspan="<?php echo e($rowspan); ?>" class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->nama); ?>

                                        </p>
                                    </td>

                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->obatt[0]->nama); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->qty); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->satuan); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->signa->signa); ?>

                                        </p>
                                    </td>
                                    <td rowspan="<?php echo e($rowspan); ?>" class="px-8 py-8 border-b border-gray-200 bg-white">
                                        <a href="/obatRacik/<?php echo e($medicine->kode); ?>/edit" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 mt-1 rounded">Edit</a>
                                        <form onsubmit="return confirm('Hapus data?')" action="/obatRacik/<?php echo e($medicine->kode); ?>" method="POST" class="inline">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="bg-red-800 hover:bg-red-700 text-white py-1 px-1 mt-1 rounded">Hapus</button>
                                        </form>
                                    </td>
                                </tr>    
                            <?php else: ?>
                                <tr class="border-2">    
                                     <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->obatt[0]->nama); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->qty); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->satuan); ?>

                                        </p>
                                    </td>
                                    <td class="px-3 py-1 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo e($medicine->signa->signa); ?>

                                        </p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div
                        class="px-3 py-1 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="inline-flex mt-2 xs:mt-0">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ae6b45c011e855a5545a671a7f3568e)): ?>
<?php $attributes = $__attributesOriginal7ae6b45c011e855a5545a671a7f3568e; ?>
<?php unset($__attributesOriginal7ae6b45c011e855a5545a671a7f3568e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ae6b45c011e855a5545a671a7f3568e)): ?>
<?php $component = $__componentOriginal7ae6b45c011e855a5545a671a7f3568e; ?>
<?php unset($__componentOriginal7ae6b45c011e855a5545a671a7f3568e); ?>
<?php endif; ?><?php /**PATH C:\0dika\Code\project\E-Rescription_SIPATEX\resources\views/components/mixedMedicines/index.blade.php ENDPATH**/ ?>