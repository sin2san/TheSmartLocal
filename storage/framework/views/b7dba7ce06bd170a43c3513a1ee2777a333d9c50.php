<?php $__env->startSection('title'); ?>
    <?php if(Request::is('/')): ?> Home <?php else: ?> <?php echo e($userName); ?> <?php endif; ?> |
    GitHubGist
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container list">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4">
                    <i class="fa fa-code"></i> <b>Discover Gists</b>
                </div>
            </div>
            <hr />
        </div>
        <?php if(count($responseBody) > 0): ?>
            <?php $__currentLoopData = $responseBody; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <img class="user-image mr-2" src="<?php echo e($response->owner->avatar_url); ?>"
                                alt="<?php echo e($response->owner->login); ?>" />
                            <p class="name mb-0">
                                <a href="<?php echo e($response->owner->html_url); ?>"> <?php echo e($response->owner->login); ?></a>
                                <br />
                                <small>Created <?php echo e(\Carbon\Carbon::parse($response->created_at)->diffForHumans()); ?></small>
                                <br />
                                <small><?php echo e($response->description); ?></small>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="name">
                            <a class="comment mx-1" href="<?php echo e($response->comments_url); ?>">
                                <i class="fa fa-comment-o mr-1"></i>
                                <?php echo e($response->comments); ?> Comments
                            </a>
                            <span id="<?php echo e($response->id); ?>">
                                Favourite
                            </span>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="code-link" href="<?php echo e($response->html_url); ?>">
                            <?php $__currentLoopData = $response->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="mb-0 mt-2"><?php echo e($file->filename); ?></p>
                                <pre>
                                    <code>
                                        <?php echo Illuminate\Mail\Markdown::parse(file_get_contents($file->raw_url)); ?>

                                    </code>
                                </pre>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <h5><b>You don’t have any gists yet.</b></h5>
                    <p>Your public gists will show up here on your profile. <a href="https://gist.github.com/"
                            target="_blank">Create a gist</a> to get started.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        // Get local storage items
        var favourites = JSON.parse(localStorage.getItem(
            '<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites')) || [];
        favourites.forEach(function(favourite) {
            if (document.getElementById(favourite)) {
                document.getElementById(favourite).className = 'fav';
            }
        });

        // Store or Remove items to local storage
        document.querySelector('.list').addEventListener('click', function(e) {
            var id = e.target.id,
                item = e.target,
                index = favourites.indexOf(id);
            if (!id) return;
            if (index == -1) {
                favourites.push(id);
                item.className = 'fav';
            } else {
                favourites.splice(index, 1);
                item.className = '';
            }
            localStorage.setItem('<?php echo Auth::id() . '_' . Auth::user()->login; ?>_Favourites', JSON.stringify(
                favourites));
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sinthu\Desktop\mypro\resources\views/home.blade.php ENDPATH**/ ?>