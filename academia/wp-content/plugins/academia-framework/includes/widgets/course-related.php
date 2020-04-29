<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 1/5/2016
 * Time: 2:23 PM
 */

class G5Plus_Widget_Course_Related extends  G5Plus_Widget {
    public function __construct() {
        $this->widget_cssclass    = 'widget-course woocommerce';
        $this->widget_description = esc_html__( "Course Related widget", 'g5plus-academia' );
        $this->widget_id          = 'g5plus-course-related';
        $this->widget_name        = esc_html__( 'G5Plus: Course Related', 'g5plus-academia' );
        $this->settings           = array(
            'title' => array(
                'type' => 'text',
                'std' => '',
                'label' => esc_html__('Title','g5plus-academia')
            ),
            'number' => array(
                'type'  => 'number',
                'std'   => '5',
                'label' => esc_html__( 'Number of course to show', 'g5plus-academia' ),
            ),
            'order'  => array(
                'type'    => 'select',
                'std'     => 'random',
                'label'   => esc_html__( 'Order', 'g5plus-academia' ),
                'options' => array(
                    'rand' => esc_html__('Random','g5plus-academia'),
                    'DESC' => esc_html__('Descending','g5plus-academia'),
                    'ASC'  => esc_html__( 'Ascending', 'g5plus-academia' )
                )
            ),
        );
        parent::__construct();
    }

    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        if(!class_exists('WooCommerce')){
            return;
        }
        global $product, $woocommerce_loop;

        if ( empty( $product ) || ! $product->exists() ) {
            return;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $order        = empty( $instance['order'] ) ? '' : $instance['order'];
        $orderby = $order == 'rand' ? $order : 'post_id';
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $query_args = array();

        $related = $product->get_related( $number );
        if ( sizeof( $related ) == 0 ) return;

        $args_related_product = apply_filters( 'woocommerce_related_products_args', array(
            'post_type'            => 'product',
            'ignore_sticky_posts'  => 1,
            'no_found_rows'        => 1,
            'posts_per_page'       => $number,
            'order'                => $order,
            'orderby'              => $orderby,
            'post__in'             => $related,
            'post__not_in'         => array( $product->id )
        ) );
        $products_related = new WP_Query( $args_related_product );

        ob_start();
        if ( $products_related->have_posts() ) : ?>
            <?php echo wp_kses_post($args['before_widget']); ?>
            <?php if ( $title ) {
                echo wp_kses_post($args['before_title'] . $title . $args['after_title']);
            } ?>
            <div class="widget-content">
                <?php woocommerce_product_loop_start(); ?>

                <?php while ( $products_related->have_posts() ) : $products_related->the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product-related' ); ?>

                <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>
            </div>
            <?php echo wp_kses_post($args['after_widget']); ?>

        <?php endif;
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        $content =  ob_get_clean();
        echo wp_kses_post($content);
    }
}

if (!function_exists('g5plus_register_widget_course_related')) {
    function g5plus_register_widget_course_related() {
        if(class_exists('WooCommerce')){
            register_widget('G5Plus_Widget_Course_Related');
        }
    }
    add_action('widgets_init', 'g5plus_register_widget_course_related', 1);
}
