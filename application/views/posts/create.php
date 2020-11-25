<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create') ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" type="text" class="form-control" name="body" placeholder="Add Body"></textarea>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input id="image_file" type="file" name="files[]" size="20" multiple/>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

