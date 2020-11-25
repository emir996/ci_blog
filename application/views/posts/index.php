<h2 class="text-center">Welcome <?= ucfirst($name); ?></h2><br><br>
<h3><?= $title ?></h3><br>


<?php foreach($posts as $post) : ?>

    <div class="crud">
        <a class="titlePost"><?php echo $post['title']; ?></a>
        <?php if($this->session->userdata('logged_in')){ ?>
        <a class="deleteIcon pull-right" href="<?php echo base_url() . 'posts/delete/'.$post['id'];?>">delete</a>
        <a class="editIcon pull-right" href="<?php echo base_url() . 'posts/edit/' . $post['id']; ?>">edit</a>
        <?php  } else { ?>
            <a class="readIcon pull-right" href="<?php echo base_url() . 'posts/view/' . $post['id']?>">read more...</a>
        <?php } ?>
        
    </div>
    
    <hr>
    
<?php endforeach; ?>
<div class="pagination-links pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>