<?php 

add_action( 'widgets_init', create_function('', 'return register_widget("MyNewWidget");') );

class MyNewWidget extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'MyNewWidget', 'description' => __('Widget description'));
        parent::_construct('MyNewWidget', _('Widget Name'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;

        echo $before_title . __('Widget title') . $after_title;

        // widget logic/output

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
    }

    function form( $instance ) {
        // Output admin widget options form
    }
}

add_action( 'widgets_init', create_function('', 'return register_widget("MyNewWidget2");') );

class MyNewWidget2 extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'MyNewWidget2', 'description' => __('Widget description'));
        parent::_construct('MyNewWidget2', _('Widget2 Name'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;

        echo $before_title . __('Widget title') . $after_title;

        // widget logic/output

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
    }

    function form( $instance ) {
        // Output admin widget options form
    }
}

add_action( 'widgets_init', create_function('', 'return register_widget("MyNewWidget3");') );

class MyNewWidget3 extends WP_Widget {
    function __construct() {
        $widget_ops = array('classname' => 'MyNewWidget3', 'description' => __('Widget description'));
        parent::_construct('MyNewWidget3', _('Widget3 Name'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        echo $before_widget;

        echo $before_title . __('Widget title') . $after_title;

        // widget logic/output

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
    }

    function form( $instance ) {
        // Output admin widget options form
    }
}
