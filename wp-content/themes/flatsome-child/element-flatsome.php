<?php



function stywin_ux_builder_element(){

	$link_img = home_url().'/wp-content/themes/flatsome-child/img/admin/forms.svg';

	

    add_ux_builder_shortcode('SC_NewsAndKnowledge', array(

        'name'      => __('Tin Tức Kiến thức'),

        'category'  => __('Nhân Trần'),

        'priority'  => 1,

        'thumbnail' =>  $link_img,

		'options' => array(

            'title_widget' => array(

            	'type' => 'textfield',

            	'heading' => 'Tiêu Đề',

        	),

			'title_widget_2' => array(

            	'type' => 'textfield',

            	'heading' => 'Tiêu Đề Nối',

        	),

			'description' => array(

            	'type' => 'textfield',

            	'heading' => 'Mô tả',

        	),

			'link' => array(

            	'type' => 'textfield',

            	'heading' => 'Url Xem tất cả',

        	),

			'count_posts' => array(

            	'type' => 'slider',

				'default' => 3,

                'max' => 10,

                'min' => 1,

            	'heading' => 'Số lượng bài viết',

        	),

        ),

    ));



	add_ux_builder_shortcode('SC_evented', array(

        'name'      => __('Blog Sự kiện A'),

        'category'  => __('Nhân Trần'),

        'priority'  => 1,

        'thumbnail' =>  $link_img,

		'options' => array(

            'class' => array(

            	'type' => 'textfield',

            	'heading' => 'Class',

        	),

			'count_posts' => array(

            	'type' => 'slider',

				'default' => 4,

                'max' => 10,

                'min' => 1,

            	'heading' => 'Số lượng bài viết',

        	),

        ),

    ));



	add_ux_builder_shortcode('SC_eventing', array(

        'name'      => __('Blog Sự kiện B'),

        'category'  => __('Nhân Trần'),

        'priority'  => 1,

        'thumbnail' =>  $link_img,

		'options' => array(

            'class' => array(

            	'type' => 'textfield',

            	'heading' => 'Class',

        	),

			'count_posts' => array(

            	'type' => 'slider',

				'default' => 4,

                'max' => 10,

                'min' => 1,

            	'heading' => 'Số lượng bài viết',

        	),

        ),

    ));

}

add_action('ux_builder_setup', 'stywin_ux_builder_element');