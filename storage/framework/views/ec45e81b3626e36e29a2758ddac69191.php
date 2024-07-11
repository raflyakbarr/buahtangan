<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Article</h1>
            <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" id="articleForm" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($article->title); ?>">
                </div>
                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" class="form-control">
                    <?php if($article->image): ?>
                        <img src="<?php echo e(asset($article->image)); ?>" alt="Thumbnail" class="img-thumbnail mt-2" style="max-height: 150px;">
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor-container" style="height: 300px;"><?php echo $article->content; ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ 'size': [] }],
                ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                [{'list': 'ordered'}, {'list': 'bullet'},
                 {'indent': '-1'}, {'indent': '+1'}],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
        placeholder: 'Tulis sesuatu di sini...'
    });

    // Set existing content in Quill editor
    quill.root.innerHTML = `<?php echo addslashes($article->content); ?>`;

    // On form submission, populate the hidden input with Quill's HTML content
    document.getElementById('articleForm').onsubmit = function() {
        const htmlContent = quill.root.innerHTML.trim();
        document.getElementById('content').value = htmlContent.length > 0 ? htmlContent : null;
    };
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/articles/edit.blade.php ENDPATH**/ ?>