<body>
    <a class="sr-only" href="#content">Skip to main content</a>

    <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand"><?php echo SITE_NAME; ?></a>
            </div>

            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                    <?php echo $this->get('topnav'); ?>
                    <?php 
                        //admin_mode is for edit form, so should not have this save link, which is for ajax (inline mode)
                        if ($this->get('isAdmin') && !$this->get('admin_mode')) { ?>
                        <li>
                            <a href="#" class="click2save" id="<?php echo $this->get('table'); ?>" name="<?php echo $this->get('alias'); ?>">Save</a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php echo $this->get('topnav_right'); ?>
                </ul>
            </nav>
        </div>
    </header>