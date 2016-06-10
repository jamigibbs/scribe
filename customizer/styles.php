<?php

function scribe_customize_css()
{
  ?>
    <style type="text/css">
			.site-content a, .site-footer a {
        color: <?php echo get_theme_mod('scribe_link_color', '#262626'); ?>;
      }

			.site-content a:hover, .site-footer a:hover, .site-branding .site-title a:hover, .main-nav #header-menu a:hover, 	a.comment-reply-link:hover, .comment-meta a.comment-edit-link:hover, a#cancel-comment-reply-link:hover, .post .featured-bg-image .entry-header .entry-meta a:hover, .nav-panel-header .nav-panel-close:hover {
        color: <?php echo get_theme_mod('scribe_link_hover_color', '#FF3300'); ?>;
      }

      .go-home:hover, .form-submit input[type="submit"]:hover, li.comment article a.comment-reply-link:hover, .nav-btn:hover {
        background-color: <?php echo get_theme_mod('scribe_link_hover_color', '#FF3300'); ?>;
      }

			#header-menu a {
        color: <?php echo get_theme_mod('scribe_nav_link_color', '#ffffff'); ?>;
      }
			.dropdown.menu > li.is-dropdown-submenu-parent > a::after {
        border-color: <?php echo get_theme_mod('scribe_nav_link_color','#ffffff' ) ?> transparent transparent;
      }

      <?php if( get_theme_mod('scribe_primary_image') ) : ?>
        .primary-bg-image {
          background-image: url(<?php echo esc_url( get_theme_mod('scribe_primary_image') ) ?>);
          <?php $scribe_primary_img_bg_attachment = get_theme_mod('scribe_primary_img_bg_attachment', 'fixed'); ?>
          background-attachment: <?php echo esc_attr($scribe_primary_img_bg_attachment); ?>
        }

        <?php if( get_theme_mod('scribe_primary_image_overlay') == '' ) : ?>
          .primary-bg-image:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(180deg, transparent, #000000);
            opacity: 1;
            overflow: hidden;
          }
        <?php endif; ?>

      <?php endif; ?>

      .featured-bg-image {
        <?php $scribe_featured_img_bg_attachment = get_theme_mod('scribe_featured_img_bg_attachment', 'fixed'); ?>
        background-attachment: <?php echo esc_attr($scribe_featured_img_bg_attachment); ?>;
      }

      <?php if( get_theme_mod('scribe_featured_img_overlay') == '' ) : ?>
        .featured-bg-image:before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          background-image: linear-gradient(180deg, transparent, #000000);
          opacity: 1;
          overflow: hidden;
        }
      <?php endif; ?>

      <?php
        $scribe_page_post_title_color = get_theme_mod('scribe_page_post_title_color', '#ffffff' );
        $scribe_page_post_subtitle_color = get_theme_mod('scribe_page_post_subtitle_color', '#808080' );
        $scribe_page_post_meta_color = get_theme_mod('scribe_page_post_meta_color', '#ffffff' );
      ?>

      .featured-bg-image .entry-header h1 {
        color: <?php echo esc_attr($scribe_page_post_title_color); ?>;
      }

      .featured-bg-image .entry-subtitle {
        color: <?php echo esc_attr($scribe_page_post_subtitle_color); ?>;
      }

      .post .featured-bg-image .entry-header .entry-meta, .post .featured-bg-image .entry-header .entry-meta a {
        color: <?php echo esc_attr($scribe_page_post_meta_color); ?>;
      }

    </style>
  <?php
}
add_action( 'wp_head', 'scribe_customize_css');
