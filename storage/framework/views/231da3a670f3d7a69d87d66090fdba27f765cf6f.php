<?php $__env->startSection('content'); ?>
    <ul class="list">
        <span
            id="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdasdasd.com">http://Sdasdasd.com</span><br />
        <span
            id="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jqueasdasdry.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdasdasd.123com">http://Sdasdasdasdasd.com</span><br />
        <span
            id="http://ajax.googleapis.com/ajax/asdalibs/jquery/1.9.1/jquery.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdas123dasd.com">http://Sdsdasdasdasd.com</span><br />
        <span
            id="http://ajax.googleapis.com/ajax/lasdasdasdibs/jquery/1.9.1/jquery.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdasda123sd.com">http://Sdaasdasdfsdasd.com</span><br />
        <span
            id="http://ajax.googleapis.com/ajax/libs/hjkhjkjquery/1.9.1/jquery.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdasda444sd.com">http://Sdasdasd.com</span><br />
        <span
            id="http://ajax.googleapis.com/ajax/libs/jquehjkhjkry/1.9.1/jquery.min.js">http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
        </span><br />
        <span id="http://Sdasda2234sd.com">http://Sdasdfgthasd.com</span><br />
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var favorites = JSON.parse(localStorage.getItem(
            '<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favorites')) || [];
        favorites.forEach(function(favorite) {
            document.getElementById(favorite).className = 'fav';
        });
        document.querySelector('.list').addEventListener('click', function(e) {
            var id = e.target.id,
                item = e.target,
                index = favorites.indexOf(id);
                console.log(index);
            if (!id) return;
            if (index == -1) {
                favorites.push(id);
                item.className = 'fav';
                console.log(index);
            } else {
                console.log(index);
                favorites.splice(index, 1);
                item.className = '';
            }
            localStorage.setItem('<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favorites', JSON.stringify(
                favorites));
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sinthu\Desktop\mypro\resources\views/myGist.blade.php ENDPATH**/ ?>