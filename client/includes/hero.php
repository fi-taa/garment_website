<?php
// Import the CSS file

// Create the hero section
class Hero {
    private $image = '';
    private $title = '';
    private $text = '';

    public function __construct($image, $title, $text) {
        $this->image = $image;
        $this->title = $title;
        $this->text = $text;
    }

    public function render() {
        $html = '<section class="hero" style="background-image: url(' . $this->image . ');">';
        $html .= '<div class="hero-content">';
        $html .= '<h1>' . $this->title . '</h1>';
        $html .= '<p>' . $this->text . '</p>';
        $html .= '</div>';
        $html .= '</section>';
        return $html;
    }
}

// Create the hero section
$hero = new Hero('../images/hero.avif', 'Welcome to My Website', 'This is my website.');

// Render the hero section
echo $hero->render();

?>

<link rel="stylesheet" href="../styles/hero.css">
