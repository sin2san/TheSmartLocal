<?php $__env->startSection('title'); ?>
    Favourites | GitHubGist
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><b>Manage</b> Favourite Gists</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th class="text-center">#</th>
                            <th class="text-center">GIST URL</th>
                            <th class="text-center"></th>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        // Append data to HTML
        var favourites = JSON.parse(localStorage.getItem('<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites'));

        if(favourites.length > 0){
            for (var key in favourites) {
                count = parseInt(key, 10) + 1;
                $('#tableBody').append('<tr id="'+key+'"><td class="text-center">' + count + '</td><td><a href="https://gist.github.com/' + favourites[key] + '" target="_blank" class="link-color"> https://gist.github.com/' +
                    favourites[key] + '</a></td><td class="text-center"><button class="btn btn-danger btn-sm text-light-bold" onclick="deleteItem('+ key +')"><i class="fa fa-heart"></i> REMOVE</button></td></tr>');
            }
        }else{
            $('#tableBody').append('<tr><td colspan="3">You have no favourite gists</td></tr>');
        }

        // Delete Item From Array
        function deleteItem(index) {
            favourites.splice(index, 1);
            localStorage.setItem('<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites', JSON.stringify(favourites));
            window.location.reload();
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sinthu\Desktop\mypro\resources\views/favourite.blade.php ENDPATH**/ ?>