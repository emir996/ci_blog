<h2><?php echo $post['title'] ?></h2>
<small class="post-date">Posted on <?php echo $post['created_at']; ?></small>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>
<div class="post-image">
    <img src=""/>
</div>

    <div class="form-group">
        <?php foreach($images as $image): ?>
             <img src="<?php echo base_url() . 'assets/images/posts/' . $image['file_name'] ?>" width="250px" height="250px" />
        <?php endforeach; ?>
    </div>

    
</form>

