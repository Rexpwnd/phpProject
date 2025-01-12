<?php
namespace classes;
class ImageLoader {
    private $directory;
    private $allowedExtensions;

    public function __construct($directory = "images/screenshots", $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']) {
        $this->directory = rtrim($directory, '/') . '/';
        $this->allowedExtensions = $allowedExtensions;
    }

    public function loadImages() {
        if (!is_dir($this->directory)) {
            throw new \Exception("Directory not found: {$this->directory}");
        }

        $handle = opendir($this->directory);
        if (!$handle) {
            throw new \Exception("Unable to open directory: {$this->directory}");
        }

        $htmlOutput = '';
        while (false !== ($file = readdir($handle))) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $this->allowedExtensions) && is_file($this->directory . $file)) {
                $imagePath = $this->directory . $file;
                $altText = pathinfo($file, PATHINFO_FILENAME); // Use the file name as alt text for simplicity
                $htmlOutput .= <<<HTML
                <div class="item col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s">
                    <a href="{$imagePath}" class="image-popup">
                        <img src="{$imagePath}" class="img-responsive" alt="{$altText}" loading="lazy">
                    </a>
                </div>
                HTML;
            }
        }
        closedir($handle);
        return $htmlOutput;
    }
}
?>
