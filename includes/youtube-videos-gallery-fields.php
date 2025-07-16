<?php
function gvy_add_metabox_fields()
{
  add_meta_box(
    'gvy_video_fields',
    __('Video Fields', 'youtube-video-gallery'),
    'gvy_render_metabox_fields',
    'video',
    'normal',
    'default'
  );
}

add_action('add_meta_boxes', 'gvy_add_metabox_fields');

//Show the fields in the metabox
function gvy_render_metabox_fields($post)
{
  wp_nonce_field(basename(__FILE__), 'gvy_video_nonce');
  $yvg_video_record_meta = get_post_meta($post->ID);
  ?>
  <div class="envolver formulario-video">
    <div class="form-group">
      <label for="id-video"><?php esc_html_e('Id Video', 'youtube-video-gallery'); ?></label>
      <input type="text" name="id_video"
        value="<?php if (!empty($yvg_video_record_meta['id_video']))
          echo esc_attr($yvg_video_record_meta['id_video'][0]); ?>">
    </div>
    <br>
    <div class="form-group">
      <label for="detalles"><?php esc_html_e('Details', 'youtube-video-gallery'); ?></label>
      <?php
      $contenido = get_post_meta($post->ID, 'detalles', true);
      $editor = 'detalles';
      $settings = array(
        'textarea_name' => $editor,
        'textarea_rows' => 10,
        'media_buttons' => false,
      );
      wp_editor($contenido, $editor, $settings);
      ?>
    </div>
    <br>
    <?php if (isset($yvg_video_record_meta['id_video'][0])): ?>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= esc_attr($yvg_video_record_meta['id_video'][0]); ?>"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <?php endif; ?>
  </div>
  <?php
}

//Save video on database
function vyg_save_video($post_id)
{
  if (!isset($_POST['gvy_video_nonce']) || !wp_verify_nonce($_POST['gvy_video_nonce'], basename(__FILE__))) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = isset($_POST['gvy_video_nonce']) && wp_verify_nonce($_POST['gvy_video_nonce'], basename(__FILE__));
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }
  if (isset($_POST['id_video']) && isset($_POST['detalles'])) {
    update_post_meta($post_id, 'id_video', sanitize_textarea_field($_POST['id_video']));
    update_post_meta($post_id, 'detalles', sanitize_textarea_field($_POST['detalles']));
  }
}
add_action('save_post', 'vyg_save_video');