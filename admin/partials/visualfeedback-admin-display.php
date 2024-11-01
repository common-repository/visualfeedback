<?php

?>
<div class="wrap">
    <h2 class="vf-title"></h2>
    <div class="vf-logo">
        <img src="<?php echo plugins_url( 'images/logo.svg', dirname(__FILE__) ) ?>" >

    </div>
    <p>

    </p>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'visualfeedback_settings_fields' );
        do_settings_sections( 'visualfeedback_settings_fields' );
        submit_button();
        ?>
    </form>

    <div class="card help">
        <h2 class="title"><span class="dashicons-before dashicons-editor-help">Where do I find my VisualFeedback website ID?</h2>

        <div class="existing-account">
            <h3>I already have a VisualFeedback account</h3>
            <p>
                When you created your VisualFeedback account if you selected 'Wordpress' as the CMS that your website is running, you are given your Website ID to copy.
            </p>
            <p>
                If you no longer have it, or selected a different CMS, just select <strong>'Admin'</strong> on the top nav bar, then <strong>'Websites'</strong> on the left menu. Select the <strong>'Website ID'</strong> to the right of your website name and you'll be able to easily copy your website ID.
            </p>
        </div>

        <div class="no-account">
            <h3>I don't have a VisualFeedback account yet</h3>
            <p>
                When you create your VisualFeedback account, select "Wordpress" as the CMS that your website is running. You will be given your Website ID to copy and paste here.
                Get started with VisualFeedback now with our <a href="https://visualfeedback.cloud/signup">FREE Trial</a>
            </p>
        </div>


    </div>

</div> <?php
?>

