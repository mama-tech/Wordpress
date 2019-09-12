<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_School_Education_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-school-education' ),
				'family'      => esc_html__( 'Font Family', 'vw-school-education' ),
				'size'        => esc_html__( 'Font Size',   'vw-school-education' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-school-education' ),
				'style'       => esc_html__( 'Font Style',  'vw-school-education' ),
				'line_height' => esc_html__( 'Line Height', 'vw-school-education' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-school-education' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-school-education-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-school-education-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-school-education' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-school-education' ),
        'Acme' => __( 'Acme', 'vw-school-education' ),
        'Anton' => __( 'Anton', 'vw-school-education' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-school-education' ),
        'Arimo' => __( 'Arimo', 'vw-school-education' ),
        'Arsenal' => __( 'Arsenal', 'vw-school-education' ),
        'Arvo' => __( 'Arvo', 'vw-school-education' ),
        'Alegreya' => __( 'Alegreya', 'vw-school-education' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-school-education' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-school-education' ),
        'Bangers' => __( 'Bangers', 'vw-school-education' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-school-education' ),
        'Bad Script' => __( 'Bad Script', 'vw-school-education' ),
        'Bitter' => __( 'Bitter', 'vw-school-education' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-school-education' ),
        'BenchNine' => __( 'BenchNine', 'vw-school-education' ),
        'Cabin' => __( 'Cabin', 'vw-school-education' ),
        'Cardo' => __( 'Cardo', 'vw-school-education' ),
        'Courgette' => __( 'Courgette', 'vw-school-education' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-school-education' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-school-education' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-school-education' ),
        'Cuprum' => __( 'Cuprum', 'vw-school-education' ),
        'Cookie' => __( 'Cookie', 'vw-school-education' ),
        'Chewy' => __( 'Chewy', 'vw-school-education' ),
        'Days One' => __( 'Days One', 'vw-school-education' ),
        'Dosis' => __( 'Dosis', 'vw-school-education' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-school-education' ),
        'Economica' => __( 'Economica', 'vw-school-education' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-school-education' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-school-education' ),
        'Francois One' => __( 'Francois One', 'vw-school-education' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-school-education' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-school-education' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-school-education' ),
        'Handlee' => __( 'Handlee', 'vw-school-education' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-school-education' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-school-education' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-school-education' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-school-education' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-school-education' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-school-education' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-school-education' ),
        'Kanit' => __( 'Kanit', 'vw-school-education' ),
        'Lobster' => __( 'Lobster', 'vw-school-education' ),
        'Lato' => __( 'Lato', 'vw-school-education' ),
        'Lora' => __( 'Lora', 'vw-school-education' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-school-education' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-school-education' ),
        'Merriweather' => __( 'Merriweather', 'vw-school-education' ),
        'Monda' => __( 'Monda', 'vw-school-education' ),
        'Montserrat' => __( 'Montserrat', 'vw-school-education' ),
        'Muli' => __( 'Muli', 'vw-school-education' ),
        'Marck Script' => __( 'Marck Script', 'vw-school-education' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-school-education' ),
        'Open Sans' => __( 'Open Sans', 'vw-school-education' ),
        'Overpass' => __( 'Overpass', 'vw-school-education' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-school-education' ),
        'Oxygen' => __( 'Oxygen', 'vw-school-education' ),
        'Orbitron' => __( 'Orbitron', 'vw-school-education' ),
        'Patua One' => __( 'Patua One', 'vw-school-education' ),
        'Pacifico' => __( 'Pacifico', 'vw-school-education' ),
        'Padauk' => __( 'Padauk', 'vw-school-education' ),
        'Playball' => __( 'Playball', 'vw-school-education' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-school-education' ),
        'PT Sans' => __( 'PT Sans', 'vw-school-education' ),
        'Philosopher' => __( 'Philosopher', 'vw-school-education' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-school-education' ),
        'Poiret One' => __( 'Poiret One', 'vw-school-education' ),
        'Quicksand' => __( 'Quicksand', 'vw-school-education' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-school-education' ),
        'Raleway' => __( 'Raleway', 'vw-school-education' ),
        'Rubik' => __( 'Rubik', 'vw-school-education' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-school-education' ),
        'Russo One' => __( 'Russo One', 'vw-school-education' ),
        'Righteous' => __( 'Righteous', 'vw-school-education' ),
        'Slabo' => __( 'Slabo', 'vw-school-education' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-school-education' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-school-education'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-school-education' ),
        'Sacramento' => __( 'Sacramento', 'vw-school-education' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-school-education' ),
        'Tangerine' => __( 'Tangerine', 'vw-school-education' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-school-education' ),
        'VT323' => __( 'VT323', 'vw-school-education' ),
        'Varela Round' => __( 'Varela Round', 'vw-school-education' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-school-education' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-school-education' ),
        'Volkhov' => __( 'Volkhov', 'vw-school-education' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-school-education' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-school-education' ),
			'100' => esc_html__( 'Thin',       'vw-school-education' ),
			'300' => esc_html__( 'Light',      'vw-school-education' ),
			'400' => esc_html__( 'Normal',     'vw-school-education' ),
			'500' => esc_html__( 'Medium',     'vw-school-education' ),
			'700' => esc_html__( 'Bold',       'vw-school-education' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-school-education' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-school-education' ),
			'italic'  => esc_html__( 'Italic', 'vw-school-education' ),
			'oblique' => esc_html__( 'Oblique', 'vw-school-education' )
		);
	}
}
