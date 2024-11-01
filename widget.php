<?php
//==================================================================================================================================================
  //=================================================================================
  //CLASS WIDGET
  //=================================================================================
//==================================================================================================================================================

class widget_WpCoordonnees extends WP_Widget {

    //==================================================================================================================================================
      //=================================================================================
      //INIT WIDGET
      //=================================================================================
    //==================================================================================================================================================
    function widget_WpCoordonnees() {

        parent::WP_Widget(false, $name = 'WPCoordonnees');

    }

    //==================================================================================================================================================
      //=================================================================================
      //Affichage du widget en front
      //=================================================================================
    //==================================================================================================================================================
    function widget($args, $instance) {

        extract( $args );

        $entreprise_post   = $instance['entreprise_post'];
        $adresse_post   = $instance['adresse_post'];
        $code_post   = $instance['code_post'];
        $ville_post   = $instance['ville_post'];
        $email_post   = $instance['email_post'];
        $tel_post   = $instance['tel_post'];
        $siret_post   = $instance['siret_post'];

        ?>

        <?php echo $before_widget; ?>
              <?php echo $before_title.'Coordonnées'.$after_title; ?>

              <?php if(!empty($entreprise_post)) : ?>
                <?php echo '<p class="entreprise">'; ?>
                  <?php echo '<span>Nom entreprise : </span>'.$entreprise_post; ?>
                <?php echo '</p>'; ?>
              <?php endif; ?>

              <?php if(!empty($adresse_post) && !empty($code_post) && !empty($ville_post)) : ?>
                <?php echo '<p class="adresse">'; ?>
                  <?php echo '<span>Adresse postale :</span><br />'.$adresse_post.'<br />'.$code_post.' '.$ville_post; ?>
                <?php echo '</p>'; ?>
              <?php endif; ?>

              <?php if(!empty($email_post)) : ?>
                <?php echo '<p class="email">'; ?>
                  <?php echo '<span>Email : </span>'.$email_post; ?>
                <?php echo '</p>'; ?>
              <?php endif; ?>

              <?php if(!empty($tel_post)) : ?>
                <?php echo '<p class="tel">'; ?>
                  <?php echo '<span>Tél : </span>'.$tel_post; ?>
                <?php echo '</p>'; ?>
              <?php endif; ?>

              <?php if(!empty($siret_post)) : ?>
                <?php echo '<p class="siret">'; ?>
                  <?php echo '<span>SIRET : </span>'.$siret_post; ?>
                <?php echo '</p>'; ?>
              <?php endif; ?>                
        <?php echo $after_widget; ?>

        <?php

    }

    //==================================================================================================================================================
      //=================================================================================
      //Enregistrement des données du widget
      //=================================================================================
    //==================================================================================================================================================
    function update($new_instance, $old_instance) 
    {

        $instance = $old_instance;

        $instance['entreprise_post'] = strip_tags($new_instance['entreprise_post']);
        $instance['adresse_post'] = strip_tags($new_instance['adresse_post']);
        $instance['code_post'] = strip_tags($new_instance['code_post']);
        $instance['ville_post'] = strip_tags($new_instance['ville_post']);
        $instance['email_post']  = strip_tags($new_instance['email_post']);
        $instance['tel_post']  = strip_tags($new_instance['tel_post']);
        $instance['siret_post']  = strip_tags($new_instance['siret_post']);

        return $instance;

    }

    //==================================================================================================================================================
      //=================================================================================
      //Formulaire du widget
      //=================================================================================
    //==================================================================================================================================================
    function form($instance) 
    {

      $entreprise_post  = esc_attr($instance['entreprise_post']);
      $adresse_post  = esc_attr($instance['adresse_post']);
      $code_post   = esc_attr($instance['code_post']);
      $ville_post   = esc_attr($instance['ville_post']);
      $email_post   = esc_attr($instance['email_post']);
      $tel_post   = esc_attr($instance['tel_post']);
      $siret_post   = esc_attr($instance['siret_post']);

      ?>
      <p>
        <label for="<?php echo $this->get_field_id('entreprise'); ?>"><?php _e('Nom entreprise'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('entreprise'); ?>" name="<?php echo $this->get_field_name('entreprise_post'); ?>" type="text" value="<?php echo $entreprise_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('adresse'); ?>"><?php _e('Adresse'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('adresse'); ?>" name="<?php echo $this->get_field_name('adresse_post'); ?>" type="text" value="<?php echo $adresse_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('code'); ?>"><?php _e('Code postal'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('code'); ?>" name="<?php echo $this->get_field_name('code_post'); ?>" type="text" value="<?php echo $code_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('ville'); ?>"><?php _e('Ville'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('ville'); ?>" name="<?php echo $this->get_field_name('ville_post'); ?>" type="text" value="<?php echo $ville_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('E-mail'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email_post'); ?>" type="text" value="<?php echo $email_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('tel'); ?>"><?php _e('Téléphone'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('tel'); ?>" name="<?php echo $this->get_field_name('tel_post'); ?>" type="text" value="<?php echo $tel_post; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('siret'); ?>"><?php _e('SIRET'); ?>:</label> 
        <input class="widefat" id="<?php echo $this->get_field_id('siret'); ?>" name="<?php echo $this->get_field_name('siret_post'); ?>" type="text" value="<?php echo $siret_post; ?>" />
      </p>

      <?php 

    }

}

//EXEC WIDGET
add_action('widgets_init', create_function('', 'return register_widget("widget_WpCoordonnees");'));

?>