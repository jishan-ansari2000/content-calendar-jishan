
<h1 class="entry-title">Schedule Content</h1>

 
<div class="cc-form-group">

    <?php settings_errors(); ?>

    <form id="cc_form" method="post">
        <div>
            <label for="day" >Select Date:</label>
            <input id="day" type="date" name="date" required />
        </div>
        <div>
            <label for="occasion" >Occasion:</label>
            <input id="occasion" type="text" name="occasion" required />
        </div>
        <div>
            <label for="post_title" >Post Title:</label>
            <input id="post_title" type="text" name="post_title" required />
        </div>
        <div>
            

            <label for="author">Author:</label>
            <select name="author" id="author" required disabled>
                <?php
                    $current_user = wp_get_current_user(array(
                        'fields' => array('ID', 'display_name')
                    ));
                ?>
                <option value="<?php echo $current_user->ID ?>" > <?php echo $current_user->display_name ?> </option>
            </select>

        </div>

        <div>

            <label for="reviewer">Reviewer:</label>
            <select name="reviewer" id="reviewer" required>
                <?php
                    $admins = get_users(array(
                        'exclude' => array(get_current_user_id())
                    ));

                    foreach ($admins as $admin) {
                        echo '<option value="' . $admin->ID . '">' . $admin->display_name . '</option>';
                    }
                ?>
            </select>

        </div>

        <?php submit_button('Add Scheduled Content'); ?>
        
    </form>
</div>
