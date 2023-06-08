<?php
// Create the navigation bar
class Nav {
    private $links = [];
    private $logo;

    public function addLink($text, $url) {
        $this->links[] = [
            'text' => $text,
            'url' => $url
        ];
    }

    public function setLogo($url) {
        $this->logo = $url;
    }

    public function render() {
        $html = '<nav class="navbar">';
        $html .= '<div class="logo"><img src="' . $this->logo . '" alt="Logo"></div>';
        $html .= '<ul class="nav-list">';
        foreach ($this->links as $link) {
            $html .= '<li class="nav-item"><a href="' . $link['url'] . '">' . $link['text'] . '</a></li>';
        }
        $html .= '</ul>';
        $html .= '</nav>';
        return $html;
    }
}

// Create the navigation bar
$nav = new Nav();

// Add the home link
$nav->addLink('Home', '/');

// Add the about link
$nav->addLink('About', '/about');

// Add the services link
$nav->addLink('Product', '/services');

// Add the contact link
$nav->addLink('Contact', '/contact');

// Set the logo
$nav->setLogo('path/to/logo.png');

// Render the navigation bar
echo $nav->render();


?>

<link rel="stylesheet" href="../styles/header.css">

