<?php
/**
 * Custom columns of category with various options
 *
 * @package Acme Themes
 * @subpackage Feminine Style
 * @since 1.0.0
 */
if ( ! class_exists( 'Feminine_Style_Posts_Col' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage Feminine Style _Style_Posts_Col
     * @since 1.0.0
     */
    class Feminine_Style_Posts_Col extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
	        'unique_id'                     	=> '',
	        'feminine_style_widget_title'      => '',
	        'post_advanced_option'          	=> 'recent',
	        'feminine_style_post_cat'          => -1,
	        'feminine_style_post_tag'          => -1,
            'post_number'                   	=> 4,
	        'content_from'                  	=> 'excerpt',
	        'content_words'                 	=> 21,
            'column_number'                 	=> 4,
            'orderby'                       	=> 'date',
            'order'                         	=> 'DESC',
	        'feminine_style_img_size'          => 'large',
	        'background_options'            	=> 'default'
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'feminine_style_posts_col',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Posts Column', 'feminine-style'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show posts from selected category with advanced options', 'feminine-style' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = esc_attr( $instance['unique_id'] );
	        $title                      = esc_attr( $instance['feminine_style_widget_title'] );
	        $post_advanced_option       = esc_attr( $instance['post_advanced_option'] );
	        $feminine_style_post_cat       = esc_attr( $instance['feminine_style_post_cat'] );
	        $feminine_style_post_tag       = esc_attr( $instance['feminine_style_post_tag'] );
	        $post_number                = absint( $instance['post_number'] );
	        $content_from               = esc_attr( $instance['content_from'] );
	        $content_words              = intval( $instance['content_words'] );
	        $column_number              = absint( $instance['column_number'] );
	        $orderby                    = esc_attr( $instance['orderby'] );
	        $order                      = esc_attr( $instance['order'] );
	        $feminine_style_img_size       = esc_attr( $instance['feminine_style_img_size'] );
	        $background_options         = esc_attr( $instance['background_options'] );

	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php _e( 'Section ID', 'feminine-style' ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php _e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','feminine-style')?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'feminine_style_widget_title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'feminine-style' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'feminine_style_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feminine_style_widget_title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>"><?php esc_html_e( 'Show', 'feminine-style' ); ?></label>
                <select class="widefat at-post-advanced-option" id="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_advanced_option' ) ); ?>" >
			        <?php
			        $post_advanced_options = feminine_style_post_advanced_options();
			        foreach ( $post_advanced_options as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $post_advanced_option ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p class="post-cat post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('feminine_style_post_cat') ); ?>">
                    <?php esc_html_e('Select Category', 'feminine-style'); ?>
                </label>
                <?php
                $feminine_style_dropown_cat = array(
	                'show_option_none'   => false,
	                'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $feminine_style_post_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('feminine_style_post_cat'),
                    'id'                 => $this->get_field_id('feminine_style_post_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories( $feminine_style_dropown_cat );
                ?>
            </p>
            <p class="post-tag post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('feminine_style_post_tag') ); ?>">
			        <?php esc_html_e('Select Tag', 'feminine-style'); ?>
                </label>
		        <?php
		        $feminine_style_dropown_cat = array(
			        'show_option_none'   => false,
			        'orderby'            => 'name',
			        'order'              => 'asc',
			        'show_count'         => 1,
			        'hide_empty'         => 1,
			        'echo'               => 1,
			        'selected'           => $feminine_style_post_tag,
			        'hierarchical'       => 1,
			        'name'               => $this->get_field_name('feminine_style_post_tag'),
			        'id'                 => $this->get_field_name('feminine_style_post_tag'),
			        'class'              => 'widefat',
			        'taxonomy'           => 'post_tag',
			        'hide_if_empty'      => false,
		        );
		        wp_dropdown_categories( $feminine_style_dropown_cat );
		        ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>">
			        <?php esc_html_e( 'Number of posts to show', 'feminine-style' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'content_from' ) ); ?>"><?php _e( 'Content From', 'feminine-style' ); ?>:</label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_from' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_from' ) ); ?>">
			        <?php
			        $feminine_style_about_content_from = feminine_style_content_from();
			        foreach ( $feminine_style_about_content_from as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $content_from ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'content_words' ) ); ?>">
			        <?php esc_html_e( 'Number of words on content', 'feminine-style' ); ?>
                </label>
                <br/>
                <small>
		            <?php esc_html_e('Please enter -1 to show full content or 0 to show none','feminine-style'); ?>
                </small>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_words' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_words' ) ); ?>" type="number" value="<?php echo $content_words; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'feminine-style' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>" >
			        <?php
			        $feminine_style_widget_column_numbers = feminine_style_widget_column_number();
			        foreach ( $feminine_style_widget_column_numbers as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'feminine-style' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" >
			        <?php
			        $feminine_style_post_orderby = feminine_style_post_orderby();
			        foreach ( $feminine_style_post_orderby as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $orderby ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'feminine-style' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" >
			        <?php
			        $feminine_style_post_order = feminine_style_post_order();
			        foreach ( $feminine_style_post_order as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $order ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <hr /><!--view all link separate-->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'feminine_style_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'feminine-style' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'feminine_style_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feminine_style_img_size' ) ); ?>">
			        <?php
			        $feminine_style_image_sizes = feminine_style_get_image_sizes_options();
			        foreach( $feminine_style_image_sizes as $key => $feminine_style_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( esc_attr( $feminine_style_img_size ), $key, 0). '>'.esc_html( $feminine_style_column_array ).'</option>';
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'feminine-style' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
			        <?php
			        $feminine_style_background_options = feminine_style_background_options();
			        foreach ( $feminine_style_background_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <hr /><!--view all link separate-->
            <p>
                <small><?php esc_html_e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'feminine-style'); ?></small>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
	        $instance['unique_id']                      = sanitize_key( $new_instance['unique_id'] );
	        $instance['feminine_style_widget_title']     = ( isset( $new_instance['feminine_style_widget_title'] ) ) ? sanitize_text_field( $new_instance['feminine_style_widget_title'] ) : '';

	        $post_advanced_options                  = feminine_style_post_advanced_options();
	        $instance['post_advanced_option']       = feminine_style_sanitize_choice_options( $new_instance['post_advanced_option'], $post_advanced_options, 'recent' );
	        
	        $instance['feminine_style_post_cat']     = ( isset( $new_instance['feminine_style_post_cat'] ) ) ? esc_attr( $new_instance['feminine_style_post_cat'] ) : '';
	        $instance['feminine_style_post_tag']     = ( isset( $new_instance['feminine_style_post_tag'] ) ) ? esc_attr( $new_instance['feminine_style_post_tag'] ) : '';
	        $instance['post_number']                = absint( $new_instance['post_number'] );

	        $feminine_style_about_content_from   = feminine_style_content_from();
	        $instance['content_from']           = feminine_style_sanitize_choice_options( $new_instance['content_from'], $feminine_style_about_content_from, 'excerpt' );

	        $instance['content_words']              = intval( $new_instance['content_words'] );
	        $instance['column_number']              = absint( $new_instance['column_number'] );

	        $feminine_style_post_orderby             = feminine_style_post_orderby();
	        $instance['orderby']                    = feminine_style_sanitize_choice_options( $new_instance['orderby'], $feminine_style_post_orderby, 'date' );

	        $feminine_style_post_order               = feminine_style_post_order();
	        $instance['order']                      = feminine_style_sanitize_choice_options( $new_instance['order'], $feminine_style_post_order, 'DESC' );

	        $feminine_style_image_sizes             = feminine_style_get_image_sizes_options();
	        $instance['feminine_style_img_size']    = feminine_style_sanitize_choice_options( $new_instance['feminine_style_img_size'], $feminine_style_image_sizes, 'post-thumbnail' );

	        $feminine_style_widget_background_options    = feminine_style_background_options();
	        $instance['background_options']             = feminine_style_sanitize_choice_options( $new_instance['background_options'], $feminine_style_widget_background_options, 'default' );

	        return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance                       = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                      = !empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
	        $feminine_style_post_cat         = esc_attr( $instance['feminine_style_post_cat'] );
	        $feminine_style_post_tag         = esc_attr( $instance['feminine_style_post_tag'] );
	        $title                          = !empty( $instance['feminine_style_widget_title'] ) ? esc_attr( $instance['feminine_style_widget_title'] ) : get_cat_name($feminine_style_post_cat);
	        $title                          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	        $post_advanced_option       = esc_attr( $instance['post_advanced_option'] );
	        $post_number                = absint( $instance['post_number'] );
	        $content_from               = esc_attr( $instance['content_from'] );
	        $content_words              = intval( $instance['content_words'] );
	        $column_number              = absint( $instance['column_number'] );
	        $orderby                    = esc_attr( $instance['orderby'] );
	        $order                      = esc_attr( $instance['order'] );
	        $feminine_style_img_size     = esc_attr( $instance['feminine_style_img_size'] );

	        $background_options     = esc_attr( $instance['background_options'] );
	        $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

	        /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $sticky = get_option( 'sticky_posts' );
	        $query_args = array(
		        'posts_per_page'        => $post_number,
		        'post_status'           => 'publish',
		        'post_type'             => 'post',
		        'no_found_rows'         => 1,
		        'order'                 => $order,
		        'ignore_sticky_posts'   => true,
		        'post__not_in'          => $sticky
	        );
	        switch ( $post_advanced_option ) {

		        case 'cat' :
			        $query_args['cat'] = $feminine_style_post_cat;
			        break;

		        case 'tag' :
			        $query_args['tag'] = $feminine_style_post_tag;
			        break;
	        }

	        switch ( $orderby ) {

                case 'ID' :
		        case 'author' :
		        case 'title' :
		        case 'date' :
		        case 'modified' :
		        case 'rand' :
		        case 'comment_count' :
		        case 'menu_order' :
			        $query_args['orderby']  = $orderby;
			        break;

		        default :
			        $query_args['orderby']  = 'date';
	        }

            $feminine_style_featured_query = new WP_Query( $query_args );

            if ($feminine_style_featured_query->have_posts()) :
                echo $args['before_widget'];
	            $animation = "init-animate zoomIn";
            ?>
                <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-col-posts <?php echo $bg_gray_class;?>">
                    <div class="container">
                        <?php
                        if( ! empty( $title ) ){
                            echo "<div class='at-widget-title-wrapper ".$animation."'>";
                            if ( ! empty( $title ) ) {
                                if( -1 != $feminine_style_post_cat ){
                                    echo "<div class='at-cat-color-wrap-".$feminine_style_post_cat."'>";
                                }
                                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                                if( -1 != $feminine_style_post_cat ){
                                    echo "</div>";
                                }
                            }

                            echo "</div>";
                        }
                 
                        $div_attr = 'class="featured-entries-col"';
                        ?>
                        <div <?php echo esc_attr( $div_attr ); ?>>
                            <?php
                            $feminine_style_featured_index = 1;
                            while ( $feminine_style_featured_query->have_posts() ) :$feminine_style_featured_query->the_post();
                            $thumb = $feminine_style_img_size;
                            $feminine_style_list_classes = 'single-list';
                            $feminine_style_words = $content_words;

							if( 1 != $feminine_style_featured_index && $feminine_style_featured_index % $column_number == 1 ){
								echo "<div class='clearfix'></div>";
							}
							if( 1 == $column_number ){
								$feminine_style_list_classes .= " col-sm-12";
							}
							elseif( 2 == $column_number ){
								$feminine_style_list_classes .= " col-sm-6";
							}
							elseif( 3 == $column_number ){
								$feminine_style_list_classes .= " col-sm-4 col-md-4";
							}
							else{
								$feminine_style_list_classes .= " col-sm-3 col-md-3";
							}
                            ?>
                                <div class="<?php echo esc_attr( $feminine_style_list_classes ); ?>">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class( $animation ); ?>>
                                        <div class="content-wrapper">
                                            <div class="image-wrap">
                                                <?php
                                                $no_blog_image ='';
                                                if ( has_post_thumbnail() ) {
                                                    ?>
                                                    <!--post thumbnail options-->
                                                    <div class="post-thumb">
	                                                    <?php
	                                                    echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
	                                                    the_post_thumbnail( $thumb );
	                                                    echo '</a>';
	                                                    ?>
                                                        <header class="entry-header">
                                                            <div class="entry-meta">
                                                                <i class="fas fa-tag" aria-hidden="true"></i>
			                                                    <?php
			                                                    feminine_style_cats_lists()
			                                                    ?>
                                                            </div><!-- .entry-meta -->
                                                        </header><!-- .entry-header -->
                                                    </div><!-- .post-thumb-->
                                                    <?php
                                                } 
                                                else{
                                                    $no_blog_image = 'no-image';
                                                } 
                                                ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="acme_shapes" x="0px" y="0px" viewBox="0 0 800 104.5" style="enable-background:new 0 0 800 104.5;" xml:space="preserve">
                                                <path class="acme_shape1" d="M-1,24.3c187-68.7,303,43.3,479.2,80.2H-1V24.3z"/>
                                                <path class="acme_shape2" d="M-1,49.4c36.2,33.5,113.4,55.1,190.5,55.1c131.1,0,181.7-23.1,273.4-55.1S667.1-13.1,803,8.5v96H-1V49.4z"/>
                                                </svg>
                                            </div>
                                            <div class="entry-content <?php echo esc_attr( $no_blog_image ); ?>">
                                                <div class="entry-header-title">
                                                    <h3 class="entry-title">
                                                        <?php
		                                                echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
		                                                the_title();
		                                                echo '</a>';
		                                                ?>
                                                    </h3>
                                                </div>
                                                <?php
                                                if( 0 != $feminine_style_words ){
	                                                ?>
                                                    <div class="details">
		                                                <?php
		                                                feminine_style_advanced_content( $feminine_style_words, $content_from );
		                                                ?>
                                                    </div>
	                                                <?php
                                                }
                                                ?>
                                                <div class="date">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <span class="day-month">
                                                            <span class="day">
                                                                <?php echo esc_html( get_the_date('j') ); ?>
                                                            </span>
                                                        </span>
                                                        <span class="month">
                                                            <?php echo esc_html( get_the_date('F') ).','; ?>
                                                        </span>
                                                        <span class="year">
                                                            <?php echo esc_html( get_the_date('Y') ); ?>
                                                        </span>
                                                    </a>
                                                </div>
	                                            <?php
	                                            if( !empty( $feminine_style_read_more_text ) ){
	                                                echo '<a href="'.esc_url(get_permalink()).'" class="btn btn-primary">';
	                                                echo esc_html( $feminine_style_read_more_text );
	                                                echo '</a>';
                                                } 
                                                ?>
                                            </div><!-- .entry-content -->
                                        </div>
                                    </article><!-- #post-## -->
                                </div><!--dynamic css-->
                                <?php
                                $feminine_style_featured_index++;
                                endwhile;
                                ?>
                        </div><!--featured entries-col-->
                    </div>
                </section>
                <?php
                echo $args['after_widget'];
                echo "<div class='clearfix'></div>";
                // Reset the global $the_post as this query will have stomped on it
            endif;
            wp_reset_postdata();
        }
    } // Class Feminine_Style_Posts_Col ends here
}