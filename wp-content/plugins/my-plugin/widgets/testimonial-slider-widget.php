<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// Function to fetch reviews from the Repugen API
function fetch_reviews_from_repugen_api() {
    // Define the API endpoint and request body
    $api_url = 'https://resellerapi.repugen.com/api/public/data/reviews';
    $request_body = json_encode(array(
        'webApiUn'        => 'u$r_repugen',
        'webApiPwd'       => 'u$r_repugen123!@#',
        'SecretKey'       => 'E3CED7B9-99CF-47C6-8B0D-7889E11F557B',
        'orderby'         => 'date',
        'NoOfReviews'     => '100',
        'ShowCommentsOnly'=> 'true'
    ));

    // Set up the arguments for the POST request
    $args = array(
        'body'        => $request_body,
        'headers'     => array(
            'Content-Type' => 'application/json',
        ),
        'method'      => 'POST',
        'data_format' => 'body',
    );

    // Make the API request
    $response = wp_remote_post($api_url, $args);

    // Check if the response is an error
    if (is_wp_error($response)) {
        return 'Error: ' . $response->get_error_message();
    }

    // Get the response body
    $response_body = wp_remote_retrieve_body($response);

    // Check if the response body is valid JSON
    $data = json_decode($response_body, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
        return 'Invalid response or error decoding JSON: ' . json_last_error_msg();
    }

    // Check if the data is empty or no reviews were received
    if (empty($data)) {
        return 'No reviews available.';
    }

    return $data; // Return the fetched data
}


class Testimonial_Slider_Widget extends \Elementor\Widget_Base {

    // Define the widget name
    public function get_name() {
        return 'testimonial_slider';
    }

    // Define the widget title
    public function get_title() {
        return __('Testimonial Slider', 'my-elementor-widgets');
    }

    // Define the widget icon
    public function get_icon() {
        return 'eicon-slider-video';
    }

    // Define the categories for the widget
    public function get_categories() {
        return ['general'];
    }

    // Register widget controls
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'my-elementor-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __('Testimonials', 'my-elementor-widgets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => __('Name', 'my-elementor-widgets'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('John Doe', 'my-elementor-widgets'),
                    ],
                    [
                        'name' => 'testimonial',
                        'label' => __('Testimonial', 'my-elementor-widgets'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('This is a great product!', 'my-elementor-widgets'),
                    ],
                    [
                        'name' => 'photo',
                        'label' => __('Photo', 'my-elementor-widgets'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'rating',
                        'label' => __('Rating', 'my-elementor-widgets'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '5',
                        'options' => [
                            '1' => '1 Star',
                            '2' => '2 Stars',
                            '3' => '3 Stars',
                            '4' => '4 Stars',
                            '5' => '5 Stars',
                        ],
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Render widget output on the front-end
    protected function render() {
        echo '<div class="testimonial-slider winkler-slider">';
    
        // Fetch and display reviews from the API
        $reviews = fetch_reviews_from_repugen_api();
    
        if (is_array($reviews) && isset($reviews['response'])) {
            foreach ($reviews['response'] as $index => $review) {
                // Check if the review has a 5-star rating
                $rating = isset($review['ReviewRating']) ? intval($review['ReviewRating']) : 0;
    
                if ($rating === 5) { // Only show reviews with 5-star ratings
                    echo '<div class="testimonial-slide">';
                    
                    $review_comment = isset($review['Review']) ? mb_substr(esc_html($review['Review']), 0, 100) : __('No comment provided', 'my-elementor-widgets');
                    $review_name = isset($review['ReviewerName']) ? esc_html($review['ReviewerName']) : __('Anonymous', 'my-elementor-widgets');
    
                    echo '<h4>' . "Patient's View" . '</h4>';
                    
                    // Display 5 filled stars
                    echo '<div class="star-rating">';
                    for ($i = 1; $i <= 5; $i++) {
                        echo '<span class="star filled">★</span>';
                    }
                    echo '</div>'; // Close star-rating
    
                    echo '<p>' . $review_comment . '</p><hr>';
                    echo '<h4>' . $review_name . '</h4>';
                    
                    echo '</div>'; // Close testimonial-slide
                }
            }
        } else {
            echo '<p>No reviews available from the API.</p>';
        }
    
        echo '</div>'; // Close testimonial-slider
   
      ?>
        <script>
            (function($) {
                let currentIndex = 0;
                const slides = $('.testimonial-slide');
                const totalSlides = slides.length;
    
                function showNextSlide() {
                    slides.eq(currentIndex).removeClass('active'); // Hide current slide
                    currentIndex = (currentIndex + 1) % totalSlides; // Move to next slide
                    slides.eq(currentIndex).addClass('active'); // Show next slide
                }
    
                // Change slide every 5 seconds
                setInterval(showNextSlide, 5000);
            })(jQuery);
        </script>
        <?php
    }
}


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Testimonial_Slider_Widget());