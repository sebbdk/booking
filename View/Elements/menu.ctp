<?php
    $currentUrl = Router::url();

    $links = [
        [
            "label" => "Users",
            "url" => ["prefix" => "admin", "controller" => "users", "action" => "index"],
        ],
        [
            "label" => "Bookings",
            "url" => ["prefix" => "admin", "controller" => "bookings", "action" => "index"],
        ],
        [
            "label" => "Booking Types",
            "url" => ["prefix" => "admin", "controller" => "booking_types", "action" => "index"],
        ],
        [
            "label" => "Logout",
            "url" => ["prefix" => "admin", "controller" => "users", "action" => "logout"],
        ],
    ];
?>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Booking</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
<?php
foreach ($links as $link) {
    $linkLabel = $link['label'];
    $linkUrl = Router::url($link['url']);
    $linkHtml = $this->Html->link( $linkLabel, $link['url'] );

    $linkActive = $currentUrl === $linkUrl;

    echo $this->Html->tag('li', $linkHtml, array(
        'class' => $linkActive ? 'active' : '',
        'escape' => false
    ));
}
?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>