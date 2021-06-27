<!--如果在页面其他位置引入过jquery，此处引用可以删除-->
<script src="<?php echo e(asset('vendor/markdown/js/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('vendor/markdown/js/editormd.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/markdown/lib/marked.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/markdown/lib/prettify.min.js')); ?>"></script>
<script type="text/javascript">
    $(function () {
        <?php $__currentLoopData = $editors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        editormd.markdownToHTML("<?php echo e($editor); ?>", {
            htmlDecode: "style,script,iframe",
            emoji: false,
            taskList: true,
            tex: false, // 默认不解析
            flowChart: false, // 默认不解析
            sequenceDiagram: false, // 默认不解析
            codeFold: true,
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script><?php /**PATH C:\Users\Sinthu\Desktop\mypro\resources\views/vendor/markdown/decode.blade.php ENDPATH**/ ?>