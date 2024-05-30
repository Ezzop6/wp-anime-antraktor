<?php
class AntraktorPageCreator {
  public static function create_page($file_name, $post_title, $post_type, $post_name, $post_status, $comment_status) {
    $page_id = wp_insert_post(array(
      'post_title' => $post_title,
      'post_type' => $post_type,
      'post_name' => $post_name,
      'post_content' => AntraktorPageCreator::load_page_template($file_name),
      'post_status' => $post_status,
      'comment_status' => $comment_status,
    ));
    add_post_meta($page_id, ANTRAKTOR_POST_META_PREFIX, 'default');
    AntraktorPageManager::save_post_id($page_id);
  }

  public static function create_all_pages() {
    require_once plugin_dir_path(__FILE__) . 'template/antrakt_template_map.php';
    foreach ($templates as $template) {
      AntraktorPageCreator::create_page(
        $template['file_name'],
        $template['post_title'],
        $template['post_type'],
        $template['post_name'],
        $template['post_status'],
        $template['comment_status']
      );
    }
  }

  public static function load_page_template(string $name) {
    $path = plugin_dir_path(__FILE__) . 'template/' . $name;
    if (!file_exists($path)) {
      throw new Exception('Template not found path: ' . $path);
    } else {
      return file_get_contents($path);
    }
  }

  public static function delete_all_pages() {
    $pages = AntraktorPageManager::get_pages_meta_ids();
    foreach ($pages as $page) {
      wp_delete_post($page->page_meta_id, true);
      AntraktorPageManager::delete_page_id($page->page_meta_id);
    }
  }
}
