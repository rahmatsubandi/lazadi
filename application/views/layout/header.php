<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook" target="_blank"></a>
                <a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram" target="_blank"></a>
            </div>

            <span class="topbar-child1">
                <?php echo $site->alamat ?>
            </span>

            <div class="topbar-child2">
                <span class="topbar-email">
                    <?php echo $site->email ?>
                </span>

                <div class="topbar-language rs1-select2">
                    <select class="selection-1" name="time">
                        <option><?php echo $site->telepon ?></option>
                        <option><?php echo $site->email ?></option>
                    </select>
                </div>
            </div>
        </div>