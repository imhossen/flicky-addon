<?php
 
class Flicky_Slider_Widget extends \Elementor\Widget_Base {
 
 
    public function get_name() {
        return 'flicky-slider';
    }
 
    public function get_title() {
        return __( 'Flicky Slider', 'flicky-addon' );
    }
 
    public function get_icon() {
        return 'eicon-slider-3d';
    }
 
    public function get_categories() {
        return [ 'flicky-category' ];
    }
 
    protected function _register_controls() {
 
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'flicky-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $repeater = new \Elementor\Repeater();
 
        $repeater->add_control(
            'slide_sub_title', [
                'label' => __( 'Sub Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Slide Sub Title' , 'plugin-domain' ),
                'label_block' => true,
            ]
        );
 
        $repeater->add_control(
            'slide_title', [
                'label' => __( 'Content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Slide Title' , 'plugin-domain' ),
                'show_label' => true,
            ]
        );
 
        
 
        $repeater->add_control(
            'slide_image',
            [
                'label' => __( 'Slide image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => true,
            ]
        );
 
        $this->add_control(
            'slides',
            [
                'label' => __( 'Slides', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __( 'Slide #1', 'plugin-domain' ),
                        'list_content' => __( 'Slide content', 'plugin-domain' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section();

        // Title & Description Style Tab
        $this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title & Sub Title', 'flicky-addon' ),
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
                'default' => '#223645',
				'selectors' => [
					'{{WRAPPER}} .slide__title > p' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .slide__title > p',
			]
        );

        // Sub Title Options
		$this->add_control(
			'subtitle_heading',
			[
				'label' => __( 'Sub Title', 'flicky-addon' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                
			]
		);

        // Sub Title Color
        $this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'flicky-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#647589',
				'selectors' => [
					'{{WRAPPER}} .slide__p' => 'color: {{VALUE}}',
				],
			]
        );
        // Sub Title Typography 
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .slide__p',
			]
        );
        
        $this->end_controls_section();
 
        $this->start_controls_section(
            'setting_section',
            [
                'label' => __( 'Slider Settings', 'flicky-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'fade',
            [
                'label' => __( 'Fade effecct?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'arrows',
            [
                'label' => __( 'Show arrows?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'dots',
            [
                'label' => __( 'Show dots?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'autoplay_time',
            [
                'label' => __( 'Autoplay Time', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '5000',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );
 
        $this->end_controls_section();
 
    }
 
    protected function render() {
 
        $settings = $this->get_settings_for_display();
 
        if($settings['slides']) {
            $dynamic_id = rand(78676, 967698);
            if(count($settings['slides']) > 1) {
                if($settings['fade'] == 'yes') {
                    $fade = 'true';
                } else {
                    $fade = 'false';
                }
                if($settings['arrows'] == 'yes') {
                    $arrows = 'true';
                } else {
                    $arrows = 'false';
                }
                if($settings['dots'] == 'yes') {
                    $dots = 'true';
                } else {
                    $dots = 'false';
                }
                if($settings['autoplay'] == 'yes') {
                    $autoplay = 'true';
                } else {
                    $autoplay = 'false';
                }
                if($settings['loop'] == 'yes') {
                    $loop = 'true';
                } else {
                    $loop = 'false';
                }
                echo '<script>
                jQuery(function($) {
                    jQuery(document).ready(function() {
                        $("#slides-'.$dynamic_id.'").slick({
                            arrows: '.$arrows.',
                            prevArrow: "<i class=\'fas fa-angle-left\'></i>",
                            nextArrow: "<i class=\'fas fa-angle-right\'></i>",
                            dots: '.$dots.',
                            fade: '.$fade.',
                            autoplay: '.$autoplay.',
                            loop: '.$loop.',';
 
                            if($autoplay == 'true') {
                                echo 'autoplaySpeed: '.$settings['autoplay_time'].'';
                            }
                            
 
                            echo '
                        });
                    });
                });
                </script>';
            }
            echo '<div id="slides-'.$dynamic_id.'" class="slides">';
            foreach($settings['slides'] as $slide) {
                echo '<div class="single-slide-item" style="background-image:url('.wp_get_attachment_image_url($slide['slide_image']['id'], 'large').')">
                    <div class="row">
                    <div class="slide-info">
                        <div class="slide__p">'.$slide['slide_sub_title'].'</div>
                        <div class="slide__title">'.wpautop($slide['slide_title']).'</div>
                        
                        </div>
                    </div>
                    
                </div>';
            }
            echo '</div>';
        }
        
 
    }
 
}