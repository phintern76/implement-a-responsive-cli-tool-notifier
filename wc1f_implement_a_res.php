<?php

class Notifier {
    private $width;
    private $height;

    function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    function notify($message) {
        $border = str_repeat('*', $this->width);
        $message = wordwrap($message, $this->width - 4);
        $lines = explode("\n", $message);
        $output = $border . "\n";
        foreach ($lines as $line) {
            $output .= "*" . str_pad($line, $this->width - 4) . "*" . "\n";
        }
        $output .= $border . "\n";
        echo $output;
    }
}

$width = (int) getenv('COLUMNS');
$height = (int) getenv('LINES');
$notifier = new Notifier($width, $height);

$notifier->notify("This is a test notification. It should be wrapped to the terminal width.");

?>