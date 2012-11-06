<?php if($this->users_model->isLoggedIn()): ?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php print base_url('/'); ?>">PIXELIS</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php print base_url('articles'); ?>">Articles</a></li>
                            <li><a href="<?php print base_url('articles/articles_add'); ?>">Create articles</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">users<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php print base_url('users/users_add'); ?>">Create users</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-form pull-right">
                    <a href="<?php print base_url('/users/users_logout'); ?>" class="btn">logout</a>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
<?php endif; ?>