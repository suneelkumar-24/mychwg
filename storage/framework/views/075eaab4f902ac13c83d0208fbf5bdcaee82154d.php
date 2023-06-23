<div class="card resource_card rounded-0 mb-1">
    <img src="<?php echo e(asset($post->file)); ?>">
    <div class="card-body text-center">
        <h3 class="font-weight-bold" style="height:70px;overflow:hidden;"><?php echo e($post->caption); ?></h3>
        <p class="font-weight-bold">By <?php echo e($post->author); ?></p>
        <a target="_blank" class="btn__open_resource btn-read"
            data-title="<?php echo e($post->caption); ?>"
              data-author="<?php echo e($post->user->name); ?>"
              data-author_image="<?php echo e(asset($post->user->avatar)); ?>"
              data-src="<?php echo e($post->file ?  asset($post->file) : asset('uploads/img/resource.png')); ?>"
              data-description="<?php echo e($post->desc); ?>"
              data-pdf="<?php if(isset($post->attachement)): ?> <?php echo e(asset($post->attachement)); ?> <?php endif; ?>"
              >
            Open Resource
        </a>


        <?php if(Auth::id() == $post->user_id): ?>
            <?php if($post->is_shared == true): ?>
                <a href="<?php echo e(route('social.share.resource', base64_encode($post->id))); ?>" class="text-danger font-weight-bold"><i class="fas fa-share"></i> Hold the Resource</a>
            <?php else: ?>
                <a href="<?php echo e(route('social.share.resource', base64_encode($post->id))); ?>" class="text-dark font-weight-bold"><i class="fas fa-share"></i> Share the Resource</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<p class="mt-0 pt-0 font-weight-bold">Pinned from <u><?php echo e($post->user->name); ?></u></p><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/pages/resources/resource_card.blade.php ENDPATH**/ ?>