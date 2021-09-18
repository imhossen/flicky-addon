<?php
/**
 * Elementor Counter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Counter_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'counter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Flicky Counter', 'flicky-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-number-field';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Counter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'flicky-category' ];
	}

	/**
	 * Register Counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'flicky-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        
        $this->add_control(
			'counter_title', [
				'label' => __( 'Counter Title', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Counter Title' , 'flicky-addon' ),
				'label_block' => true,

                'default' => "Counter Bar"
			]
		);

		$this->add_control(
            'columns',
            [
                'label' => __( 'Columns', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '2' => __( '2 Columns', 'plugin-domain' ),
                    '3' => __( '3 Columns', 'plugin-domain' ),
                    '4' => __( '4 Columns', 'plugin-domain' ),
                ],
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'counter_list_icon', [
				'label' => __( 'Title', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-smile',
					'library' => 'solid',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'counter_list_number', [
				'label' => __( 'Counter List Number', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => __( '465' , 'flicky-addon' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'counter_list_title', [
				'label' => __( 'Title', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Counter List Title' , 'flicky-addon' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'counter_lists',
			[
				'label' => __( 'Counters Lists', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ counter_list_title }}}',
			]
		);
       
        $this->end_controls_section();
        

      
        // Title & Description Style Tab
        $this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title & Description', 'flicky-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'separator' => 'before'
			]
        );
        // Title Options
		$this->add_control(
			'title_heading',
			[
				'label' => __( 'Title', 'flicky-addon' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                
			]
		);

        // Title Color
        $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#353858',
				'selectors' => [
					'{{WRAPPER}} .counter-title h2' => 'color: {{VALUE}}',
				],
			]
        );
        // Title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .counter-title h2',
                'default' => "'Ubuntu', Sans-serif"
			]
        );
        
        $this->end_controls_section();


		// Counter Style Tab
        $this->start_controls_section(
			'counter_style_section',
			[
				'label' => __( 'Counter', 'flicky-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

		// Counter Background
        $this->add_control(
			'counter_back',
			[
				'label' => __( 'Counter Background', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .single-counter' => 'background-color: {{VALUE}}',
				]
			]
        );		

		// Counter Icon
		$this->add_control(
			'counter_icon',
			[
				'label' => __( 'Icon', 'flicky-addon' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before'
			]
		);

		// Counter Icon Color
        $this->add_control(
			'counter_icon_color',
			[
				'label' => __( 'Icon Color', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => 'rebeccapurple',
				'selectors' => [
					'{{WRAPPER}} .single-counter i' => 'color: {{VALUE}}',
				]
			]
        );	
		
		// Counter Icon Shape
		$this->add_control(
			'icon_shape',
			[
				'label' => __( 'Shape', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'plugin-domain' ),
					'square' => __( 'Sqaure', 'plugin-domain' ),
					'framed' => __( 'Framed', 'plugin-domain' ),
				],
				'prefix_class' => 'picchi-shape-'
			]
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 90,
						'max' => 90,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 90,
				],
				'selectors' => [
					'{{WRAPPER}} .single-counter i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .single-counter i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		

        $this->end_controls_section();
	}

	/**
	 * Render Counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
        $counter_title = $settings['counter_title'];

        ?>
        <div class="counter-title">
            <h2><?php echo $counter_title;?></h2>
        </div>

<?php
		if ($settings['columns'] == '3') {
			$column = 'col-md-4';
		}else if($settings['columns'] == '2') {
			$column = 'col-md-6';
		}
		else{
			$column = 'col-md-3';
		}
		if ( $settings['counter_lists'] ) {
			
			foreach (  $settings['counter_lists'] as $item ) {
				
				?>
				<div class="<?php echo $column;?>">
					<div class="single-counter text-center">
						<div class="counter-icon"><i class="<?php echo $item['counter_list_icon']['value']; ?>"></i></div>
						<h2 class="counter"><?php echo $item['counter_list_number']; ?></h2>
                        <span ><?php echo $item['counter_list_title']; ?></span> 
					</div>
				</div>
				<?php
					}
				}
}
}