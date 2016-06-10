<?php
/**
 * Adds a subtitle field to pages and posts for display on the frontend
 *
 * @package scribe
 */

function scribe_subtitle_meta() {
  add_meta_box('scribe_subtitle_metabox', __( 'Edit Subtitle', 'scribe' ), 'scribe_subtitle_metabox_callback', array( 'post', 'page' ), 'normal', 'high');
}
add_action( 'add_meta_boxes', 'scribe_subtitle_meta' );

/**
 * Save post metadata when a post is saved.
 *
 * @param obj $post The post object.
 */
function scribe_subtitle_metabox_callback( $post ) {

  // Create nonce
  wp_nonce_field( basename( __FILE__ ), 'scribe_subtitle_nonce' );

  // Get the subtitle
  $scribe_stored_meta = get_post_meta( $post->ID ); ?>

  <p>
    <label for="sub_title">Subtitle</label>
    <input type="text" name="sub_title" id="sub_title" class="widefat" value="<?php if( isset( $scribe_stored_meta['sub_title'] ) ) { echo esc_attr( $scribe_stored_meta['sub_title'][0] ); } ?>" />
  </p>

  <?php
}

/**
 * Save post metadata when a post is saved.
 *
 * @param int $post_id The post ID.
 */
function scribe_subtitle_save_meta( $post_id ) {

  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'scribe_subtitle_nonce' ] ) && wp_verify_nonce( $_POST[ 'scribe_subtitle_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  // Checks for input and sanitizes/saves if needed
  if( isset( $_POST[ 'sub_title' ] ) ) {
    update_post_meta( $post_id, 'sub_title', sanitize_text_field( $_POST[ 'sub_title' ] ) );
  }

}
add_action( 'save_post', 'scribe_subtitle_save_meta' );
