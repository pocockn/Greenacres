<?php 
class contact_details_widget extends WP_Widget {
 
 
    function __construct() {
        parent::__construct(
            'contact_details',
            'Contact Details',
            array( 'description' => 'A place to add contact details' )
        ); 
    }
 

    function widget($args, $instance) { 
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        $telephone    = $instance['telephone'];
        $email       = $instance['email'];
        $fax       = $instance['fax'];
        ?>
            <div class="col-md-6 text-center">
                    <h6><?php echo $title; ?></h6>
                    <p>Telephone: <i><?php echo $telephone; ?></i></p>
                    <p>Email: <i><?php echo $email; ?></i></p>
                    <p>Fax: <i><?php echo $fax; ?></i></p>
            </div>
        <?php
    }
 

    function update($new_instance, $old_instance) {   
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['telephone'] = strip_tags($new_instance['telephone']);
    $instance['email'] = strip_tags($new_instance['email']);
    $instance['fax'] = strip_tags($new_instance['fax']);
        return $instance;
    }
 
    function form($instance) {  
        $title = esc_attr( $instance[ 'title' ] );
        $telephone    = esc_attr($instance['telephone']);
        $email = esc_attr($instance['email']);
        $fax    = esc_attr($instance['fax']);

        ?>
            <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Main Title:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" type="text" size="36"  value="<?php echo $title; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('telephone'); ?>"><?php _e('telephone:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('telephone'); ?>" name="<?php echo $this->get_field_name('telephone'); ?>" type="text" value="<?php echo $telephone; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('email'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        
        <p>
          <label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('fax'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" />
        </p>    
        <?php 
    } 
} // end class contact_details

?>