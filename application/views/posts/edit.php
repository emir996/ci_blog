<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/update') ?>
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>"/>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea id="editor2" type="text" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Upload Image</label>
        <input id="image_file" type="file" name="files[]" size="20" multiple/>
    </div>
    
    <button type="submit" class="btn btn-default">Update</button>
    <a class="btn btn-danger pull-right" href="<?php echo base_url() . 'posts'; ?>">Back</a>
    
    
    <br><br>

    <div class="form-group">
        <?php foreach($images as $image): ?>
            <a href="<?php echo base_url() . 'posts/deleteimg/' . $image['id'].'/'.$image['file_name'].'/'.$post['id']; ?>">X</a>
            <img src="<?php echo base_url() . 'assets/images/posts/' . $image['file_name'] ?>" width="150px" height="150px" />
            
        <?php endforeach; ?>

    </div>
</form>


    
    



