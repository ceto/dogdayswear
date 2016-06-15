      <div class="contactwrap">
        <div class="row">
          <div class="columns">
            <h3><?php _e('Nincs raktáron a kiszemelt ruhadarab?','dd'); ?></h3>
            <p><?php _e('Küldd el a nevét és a kívánt méretet. Utánajárunk.','dd'); ?></p>
          </div>
        </div>

        <form id="contact_form" action="<?= get_template_directory_uri(); ?>/contact_me.php" method="post" data-abide>

          <div class="row">
            <div class="columns">
              <label for="message_name"><?php _e('Név','dd'); ?>*
                <input type="text" required placeholder="<?php _e('Adja meg nevét','dd'); ?>*" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
                <small class="form-error">Megadása kötelező</small>
              </label>

            </div>
          </div>

          <div class="row">
            <div class="columns small-6">
              <label for="message_email"><?php _e('E-Mail cím','dd'); ?>*
                <input type="email" required placeholder="<?php _e('E-mail címe','dd'); ?>*" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
                <small class="form-error">Megadása kötelező</small>
              </label>
            </div>
            <div class="columns small-6">
              <label for="message_tel"><?php _e('Telefon','dd'); ?>
                <input type="text" placeholder="<?php _e('Add meg telefonszámodat','dd'); ?>" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
              </label>
            </div>
          </div>


          <div class="row">
            <div class="columns">
              <label for="message_text"><?php _e('Üzenet','dd'); ?>*
                <textarea required placeholder="<?php _e('pl.: termék neve, szín, méret ...','dd'); ?>" rows="5" id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
                  echo $_POST['message_text']; }?></textarea>
                <small class="form-error">Üzenet szövege lemaradt</small>
              </label>
            </div>
          </div>

          <div class="actions row text-center">
            <div class="columns">
              <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
              <input type="hidden" name="message_page" value="<?php the_title(); ?>">
              <input type="hidden" name="message_human" value="2">
              <input type="hidden" name="submitted" value="1">
              <div id="result"></div>
              <button id="contact_submit" type="submit" class="button expanded"><?php _e('Elküldöm','dd'); ?></button>
              </div>
            </div>
        </form>
      </div><!-- /.contact-wrap -->
