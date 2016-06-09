<?php
/**
 * Adds a subtitle field to pages and posts for display on the frontend
 *
 * @package scribe
 */

function scribe_subtitle() {
  add_meta_box('scribe_subtitle_metabox', 'Edit Subtitle', 'scribe_subtitle_metabox', array( 'post', 'page' ), 'normal', 'high');
}
add_action( 'add_meta_boxes', 'scribe_subtitle' );

function scribe_subtitle_metabox() {
  global $post;

  wp_nonce_field( plugin_basename( __FILE__ ), 'scribe_subtitle_nonce' ); ## Create nonce

  $subtitle = get_post_meta($post->ID, 'sub_title', true); ## Get the subtitle
  ?>
  <p>
    <label for="sub_title">Subtitle</label>
    <input type="text" name="sub_title" id="sub_title" class="widefat" value="<?php if(isset($subtitle)) { echo $subtitle; } ?>" />
  </p>
  <?php
}

function scribe_subtitle_save_meta($post_id, $post) {
  global $post;

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
    return false;

  if ( !current_user_can( 'edit_post', $post->ID )) {
    return $post->ID;
  }

  if ( !wp_verify_nonce( $_POST['scribe_subtitle_nonce'], plugin_basename(__FILE__) )) {

  } else {
    if($_POST['sub_title']) {
      update_post_meta($post->ID, 'sub_title', $_POST['sub_title']);
    } else {
      update_post_meta($post->ID, 'sub_title', '');
    }
  }

  return false;
}
add_action('save_post', 'scribe_subtitle_save_meta', 1, 2);
