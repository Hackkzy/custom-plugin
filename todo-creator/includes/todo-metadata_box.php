<?php
//Adding MetaBox.

function wporg_add_todo_metadata_box() {
    $screens = [ 'post', 'todo' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'wporg_box_id',
            'To-Do Metadata',
            'todo_custom_box_html',  
            $screen,
        );
    }
}
add_action( 'add_meta_boxes', 'wporg_add_todo_metadata_box' );

function todo_custom_box_html($post){
    $value = get_post_meta( $post->ID , 'custom_meta_key' , true );
    ?>
    <label for="wporg_field">Difficulty</label>
    <select name="custom_meta_key" id="custom_meta_key">
        <option <?php selected( $value , 'Good' ); ?> value="Good">Good</option>
        <option <?php selected( $value , 'Better' ); ?> value="Better">Better</option>
        <option <?php selected( $value , 'Best' ); ?> value="Best">Best</option>
    </select>
    <?php
}

function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'custom_meta_key', $_POST ) ) {
        update_post_meta(
            $post_id,
            'custom_meta_key',
            $_POST['custom_meta_key']
        );
    }
}
add_action( 'save_post', 'wporg_save_postdata' );