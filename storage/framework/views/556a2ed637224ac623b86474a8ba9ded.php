<?php $__env->startSection('content'); ?>
<div class="container p-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Buat Artikel</h1>
            <form action="<?php echo e(route('articles.store')); ?>" method="POST" id="articleForm" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="image">Thumbnail</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="hidden" name="content" id="content">
                    <div id="editor-container" style="height: 300px;"></div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

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

    // On form submission, populate the hidden input with Quill's HTML content
    document.getElementById('articleForm').onsubmit = function() {
        // Remove empty paragraphs if any (like the default <p><br></p>)
        const htmlContent = quill.root.innerHTML.trim();

        // Update the hidden input value with the actual content
        document.getElementById('content').value = htmlContent.length > 0 ? htmlContent : null;
    };
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\buahtangan\resources\views/articles/create.blade.php ENDPATH**/ ?>