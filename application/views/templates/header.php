<html>
    <head>
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css"/>
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        
    </head>
    <body>
        <nav class="navbar navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Blog</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url(); ?>about">About</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                            <?php if(!$this->session->userdata('logged_in')) :?>
                        <li><a href="<?php echo base_url(); ?>posts">Posts</a></li>
                        <li><a href="<?php echo base_url() ?>users/register">Register</a></li>
                        <li><a href="<?php echo base_url() ?>users/login">Log in</a></li>
                            <?php endif; ?>
                            <?php if($this->session->userdata('logged_in')) : ?>
                        <li><a href="<?php echo base_url(); ?>posts">Posts</a></li>
                        <li><a href="<?php echo base_url() ?>posts/create">Create</a></li>
                        <li><a href="<?php echo base_url() ?>users/logout">Log out</a></li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <!-- Flash Messages -->

            <?php if($this->session->flashdata('user_registered')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('login_failed')): 
                echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('login_success')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('user_loggedout')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_created')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_updated')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';
            ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_deleted')): 
                echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';
            ?>
            <?php endif; ?>