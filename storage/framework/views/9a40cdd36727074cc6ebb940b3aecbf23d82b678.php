<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query Form</title>
</head>
<body>
    <h1>SQL Query Form</h1>
    <form action="<?php echo e(route('executeQuery')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="query">Enter your SQL query:</label>
        <textarea name="query" id="query" rows="4" cols="50"></textarea>
        <button type="submit">Execute</button>
    </form>

    <?php if(isset($results)): ?>
        <h2>Results</h2>
        <table>
            <tr>
                <?php $__currentLoopData = $results[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($key); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($value); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
</body>
</html>
<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/vendor/laravelhelper/laravel-iide-helper/src/views/sql-query-form.blade.php ENDPATH**/ ?>