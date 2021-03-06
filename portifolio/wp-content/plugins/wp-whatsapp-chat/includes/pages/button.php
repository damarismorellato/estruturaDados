<form method="post" action="options.php">
  <?php settings_fields(sanitize_key(QLWAPP_DOMAIN . '-group')); ?>
  <?php do_settings_sections(sanitize_key(QLWAPP_DOMAIN . '-group')); ?>
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row"><?php esc_html_e('Layout', 'qlwapp'); ?></th>
        <td>
          <select name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[button][layout]" class="qlwapp-select2">
            <option value="button" <?php selected($qlwapp['button']['layout'], 'button'); ?>><?php esc_html_e('Button', 'qlwapp'); ?></option>
            <option value="bubble" <?php selected($qlwapp['button']['layout'], 'bubble'); ?>><?php esc_html_e('Bubble', 'qlwapp'); ?></option>
          </select>
          <p class="description"><?php esc_html_e('Switch to change the button layout.', 'qlwapp'); ?></p>
        </td>
      </tr>      
      <tr>
        <th scope="row"><?php esc_html_e('Rounded', 'qlwapp'); ?></th>
        <td>
          <select name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[button][rounded]" class="qlwapp-select2">
            <option value="yes" <?php selected($qlwapp['button']['rounded'], 'yes'); ?>><?php esc_html_e('Add rounded border', 'qlwapp'); ?></option>
            <option value="no" <?php selected($qlwapp['button']['rounded'], 'no'); ?>><?php esc_html_e('Remove rounded border', 'qlwapp'); ?></option>
          </select>
          <p class="description"><?php esc_html_e('Add rounded border to the button.', 'qlwapp'); ?></p>        
        </td>        
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Position', 'qlwapp'); ?></th>
        <td>
          <select name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[button][position]" class="qlwapp-select2">  
            <option value="middle-left" <?php selected($qlwapp['button']['position'], 'middle-left'); ?>><?php esc_html_e('Middle Left', 'qlwapp'); ?></option>
            <option value="middle-right" <?php selected($qlwapp['button']['position'], 'middle-right'); ?>><?php esc_html_e('Middle Right', 'qlwapp'); ?></option>
            <option value="bottom-left" <?php selected($qlwapp['button']['position'], 'bottom-left'); ?>><?php esc_html_e('Bottom Left', 'qlwapp'); ?></option>
            <option value="bottom-right" <?php selected($qlwapp['button']['position'], 'bottom-right'); ?>><?php esc_html_e('Bottom Right', 'qlwapp'); ?></option>
          </select>
          <p class="description"><?php esc_html_e('Switch to change the button position.', 'qlwapp'); ?></p>  
        </td>
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Text', 'qlwapp'); ?></th>
        <td>
          <input type="text" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[button][text]'); ?>" placeholder="<?php echo esc_html($this->defaults['button']['text']); ?>" value="<?php echo esc_attr($qlwapp['button']['text']); ?>" class="qlwapp-input"/>
          <p class="description"><?php esc_html_e('Customize your text.', 'qlwapp'); ?></p>  
        </td>
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Phone', 'qlwapp'); ?></th>
        <td>
          <input type="tel" name="<?php echo esc_attr(QLWAPP_DOMAIN . '[button][phone]'); ?>" placeholder="<?php echo esc_html($this->defaults['button']['phone']); ?>" value="<?php echo esc_attr($qlwapp['button']['phone']); ?>" class="qlwapp-input"/>
          <p class="description"><?php esc_html_e('Full phone number in international format.', 'qlwapp'); ?></p>  

        </td>
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Icon', 'qlwapp'); ?></th>
        <td>
          <div class="submit qlwapp-premium-field">
            <?php submit_button(__('Add Icon', 'qlwapp'), 'secondary', null, false, array('id' => 'btn-add-icon')); ?>
            <p class="description"><small><?php esc_html_e('This is a premium feature', 'qlwapp'); ?></small></p>    
          </div>
          <input type="text" name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[button][icon]" placeholder="<?php echo esc_html($this->defaults['button']['icon']); ?>" value="<?php echo esc_attr($qlwapp['button']['icon']); ?>" class="qlwapp-input"/>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php esc_html_e('Message', 'qlwapp'); ?></th>  
        <td>
          <textarea maxlength="500" style="width:100%;height: 100px;padding: 8px;" name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[user][message]" placeholder="<?php echo esc_html($this->defaults['user']['message']); ?>" ><?php echo esc_html(trim($qlwapp['user']['message'])); ?></textarea>
          <p class="description"><?php esc_html_e('Message that will automatically appear in the text field of a chat.', 'qlwapp'); ?></p>  
        </td>
      </tr>      
      <tr>
        <th scope="row"><?php esc_html_e('Discreet link', 'qlwapp'); ?></th>
        <td>
          <select name="<?php echo esc_attr(QLWAPP_DOMAIN); ?>[button][developer]" class="qlwapp-select2">
            <option value="yes" <?php selected($qlwapp['button']['developer'], 'yes'); ?>><?php esc_html_e('Show developer link', 'qlwapp'); ?></option>
            <option value="no" <?php selected($qlwapp['button']['developer'], 'no'); ?>><?php esc_html_e('Hide developer link', 'qlwapp'); ?></option>
          </select>
          <p class="description"><?php esc_html_e('Leave a discrete link to developer to help and keep new updates and support.', 'qlwapp'); ?></p>        
        </td>        
      </tr>
    </tbody>
  </table>
  <?php submit_button() ?>
</form>