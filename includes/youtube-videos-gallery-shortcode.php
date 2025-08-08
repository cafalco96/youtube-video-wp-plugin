<?php
//videos list
function vyg_videos_list($atts, $content = null)
{
  //shortcode attributes
  $atts = shortcode_atts(array(
    'title' => 'Videos Gallery',
    'count' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'category' => 'all',
  ), $atts, 'vyg_videos_list');

  $args = array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'posts_per_page' => intval($atts['count']),
    'orderby' => sanitize_text_field($atts['orderby']),
    'order' => sanitize_text_field($atts['order']),
  );

  if ($atts['category'] !== 'all') {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $atts['category'],
      ),
    );
  }

  $videos = new WP_Query($args);

  if ($videos->have_posts()) {
    //start output
    $output = '';

    //output building
    $output .= '<div class="lista-videos">';

    while ($videos->have_posts()) {
      $videos->the_post();

      //get field values
      $video_id = get_post_meta(get_the_ID(), 'id_video', true);
      $details = get_post_meta(get_the_ID(), 'detalles', true);

      //output video
      $output .= '<div class="gvy_video">';
      $output .= '<h4>' . get_the_title() . '</h4>';
      $output .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
      $output .= '<p>' . esc_html($details) . '</p>';
      $output .= '</div>';
    }
    $output .= '</div>';
    //post reset
    wp_reset_postdata();
    return $output;
  } else {
    return '<p>' . esc_html__('No videos found.', 'youtube-video-gallery') . '</p>';
  }
}

//Register shortcode
add_shortcode('videos', 'vyg_videos_list');