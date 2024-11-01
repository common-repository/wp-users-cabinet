<?php

/**
 * Defines widgets.
 *
 * @package WP Users Cabinet
 * @version 0.1
 */

class WP_Users_Cabinet_Widget extends WP_Widget {

	// Регистрация видежта используя основной класс
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('Widget Пользователя', 'text_domain'), // Name
			array( 'description' => __( 'Пользовательский Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( is_user_logged_in() ) {
			widget_user_info();
			wp_loginout( $_SERVER['REQUEST_URI'] );
			} else {
				wp_login_form( $args );
			}
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Личный кабинет', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} 
// конец класса Foo_Widget

// регистрация Foo_Widget в WordPress
function register_foo_widget() {
	register_widget( 'WP_Users_Cabinet_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );