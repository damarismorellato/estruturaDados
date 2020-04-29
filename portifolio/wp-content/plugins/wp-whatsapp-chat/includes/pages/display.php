<form method="post" action="options.php">
  <?php settings_fields(sanitize_key(QLWAPP_DOMAIN . '-group')); ?>
  <?php do_settings_sections(sanitize_key(QLWAPP_DOMAIN . '-group')); ?>
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row"><?php esc_html_e('Devices', 'qlwapp'); ?></th>
        <td>
          <select name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[display][devices]" style="width:350px" data-placeholder="<?php echo esc_attr('Choose target&hellip;', 'qlwapp'); ?>" aria-label="<?php echo esc_attr('Posts', 'qlwapp'); ?>" class="qlwapp-select2">
            <option value="all" <?php selected('all', $qlwapp['display']['devices']); ?>><?php esc_html_e('Show in all devices', 'qlwapp'); ?></option>
            <option value="mobile" <?php selected('mobile', $qlwapp['display']['devices']); ?>><?php esc_html_e('Show in mobile devices', 'qlwapp'); ?></option>
            <option value="desktop" <?php selected('desktop', $qlwapp['display']['devices']); ?>><?php esc_html_e('Show in desktop devices', 'qlwapp'); ?></option>
            <option value="hide" <?php selected('hide', $qlwapp['display']['devices']); ?>><?php esc_html_e('Hide in all devices', 'qlwapp'); ?></option>
          </select>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Target', 'qlwapp'); ?></th>
        <td>
          <select multiple="multiple" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[display][target][]'); ?>" style="width:350px" data-placeholder="<?php echo esc_attr('Choose target&hellip;', 'qlwapp'); ?>" aria-label="<?php echo esc_attr('Posts', 'qlwapp'); ?>" class="qlwapp-select2">
            <option value="none" <?php echo selected(true, in_array('none', (array) $qlwapp['display']['target'])); ?>><?php echo esc_html__('Exclude from all', 'qlwapp'); ?></option>
            <option value="home" <?php echo selected(true, in_array('home', (array) $qlwapp['display']['target'])); ?>><?php echo esc_html__('Home', 'qlwapp'); ?></option>
            <option value="blog" <?php echo selected(true, in_array('blog', (array) $qlwapp['display']['target'])); ?>><?php echo esc_html__('Blog', 'qlwapp'); ?></option>
            <option value="search" <?php echo selected(true, in_array('search', (array) $qlwapp['display']['target'])); ?>><?php echo esc_html__('Search', 'qlwapp'); ?></option>
            <option value="error" <?php echo selected(true, in_array('error', (array) $qlwapp['display']['target'])); ?>><?php echo esc_html('404'); ?></option>
          </select>
          <p class="description"><?php esc_html_e('If you select an option all the other will be excluded', 'qlwapp'); ?></p>
        </td>
      </tr>  
      <?php
      foreach (get_post_types(array('public' => true, 'show_in_nav_menus' => true), 'objects') as $type) {

        if (!isset($qlwapp['display'][$type->name])) {
          $qlwapp['display'][$type->name] = array();
        }

        $posts = get_posts(array(
            'post_type' => $type->name,
            'post_status' => 'publish',
            'numberposts' => 10
        ));

        if ($count = wp_count_posts($type->name)) {
          ?>
          <tr class="qlwapp-premium-field">
            <th scope="row"><?php esc_html_e(ucwords($type->label)); ?></th>
            <td>
              <select id="qlwapp_select2_<?php echo esc_attr($type->name); ?>" multiple="multiple" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[display][' . $type->name . '][]'); ?>" style="width:350px" data-placeholder="<?php printf(esc_html__('Select for %s&hellip;', 'qlwapp'), $type->label); ?>" aria-label="<?php echo esc_attr($type->label); ?>"  data-name="<?php echo esc_attr($type->name); ?>" class="<?php echo esc_attr($count->publish < 11 ? 'qlwapp-select2' : 'qlwapp-select2-ajax' ); ?>">
                <option value="none" <?php echo selected(true, in_array('none', (array) $qlwapp['display'][$type->name])); ?>><?php echo esc_html__('Exclude from all', 'qlwapp'); ?></option>
                <option value="archive" <?php echo selected(true, in_array('archive', (array) $qlwapp['display'][$type->name])); ?>><?php echo esc_html__('Archive', 'qlwapp'); ?></option>
                <?php
                if ($count->publish < 11) {

                  foreach ($posts as $post) {
                    ?>
                    <option value="<?php echo esc_attr($post->post_name); ?>" <?php echo selected(true, in_array($post->post_name, (array) $qlwapp['display'][$type->name])); ?>><?php echo esc_html($post->post_title); ?></option>
                    <?php
                  }
                }

                if (isset($qlwapp['display'][$type->name]) && count($qlwapp['display'][$type->name])) {
                  foreach ($qlwapp['display'][$type->name] as $id => $slug) {
                    if ($post = get_page_by_path($slug)) {
                      ?>
                      <option value="<?php echo esc_attr($slug); ?>" selected="selected"><?php echo esc_html(mb_substr($post->post_title, 0, 49)); ?></option>
                      <?php
                    }
                  }
                }
                ?>
              </select>
              <p class="description"><small><?php esc_html_e('This is a premium feature', 'qlwapp'); ?></small></p>    
            </td>
          </tr>       
          <?php
        }
      }
      ?>
      <?php
      foreach ($taxonomies = get_taxonomies(array('public' => true), 'objects') as $taxonomy) {

        if (!isset($qlwapp['display'][$taxonomy->name])) {
          $qlwapp['display'][$taxonomy->name] = array();
        }

        $terms = get_terms(array(
            'taxonomy' => $taxonomy->name,
            'hide_empty' => false,
        ));

        if (count($terms)) {
          ?>
          <tr>
            <th scope="row"><?php esc_html_e(ucwords($taxonomy->label)); ?></th>
            <td>
              <select multiple="multiple" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[display][' . $taxonomy->name . '][]'); ?>" style="width:350px" data-placeholder="<?php echo esc_attr('Choose target&hellip;', 'qlwapp'); ?>" aria-label="<?php echo esc_attr($taxonomy->label); ?>" class="qlwapp-select2">
                <option value="none" <?php echo selected(true, in_array('none', (array) $qlwapp['display'][$taxonomy->name])); ?>><?php echo esc_html__('Exclude from all', 'qlwapp'); ?></option>
                <?php
                foreach ($terms as $term) {
                  ?>
                  <option value="<?php echo esc_attr($term->slug); ?>" <?php echo selected(true, in_array($term->slug, (array) $qlwapp['display'][$taxonomy->name])); ?>><?php echo esc_html($term->name); ?></option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>       
          <?php
        }
      }
      ?>
    </tbody>
  </table>  
  <?php submit_button() ?>
</form>