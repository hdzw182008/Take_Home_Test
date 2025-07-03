<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="/certain" method="POST">
        <?php echo csrf_field(); ?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>id</th>
                    <th>nama</th>
                    <th>dosis</th>
                    <th>signa</th>
                    <th>kadaluarsa</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" value="<?php echo e($ob->id); ?>" id="cek<?php echo e($i); ?>" name="id[]">
                    </td>
                    <td>
                        <label for="cek<?php echo e($i); ?>"><?php echo e($ob->nama); ?></label>
                    </td>
                    <td>
                        <label for="cek<?php echo e($i); ?>"><?php echo e($ob->dosis); ?></label>
                    </td>
                    <td>
                        <label for="cek<?php echo e($i); ?>"><?php echo e($ob->signa_id); ?></label>
                    </td>
                    <td>
                        <label for="cek<?php echo e($i); ?>"><?php echo e($ob->kadaluarsa); ?></label>
                    </td>
                </tr>
                <?php $i++?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <button type="submit">cek</button>
    </form>
</body>
</html><?php /**PATH C:\0dika\Code\project\E-Rescription_SIPATEX\resources\views/certain.blade.php ENDPATH**/ ?>