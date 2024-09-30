<!-- Visibility.php -->
 <?php

 class Visibility{
    public $public;
    private $private;
    protected $protected;

    function tampilkanproperty(){
        echo "Public : " . $this->public . '<br>';
        echo "Protected : " . $this->protected . '<br>';
        echo "Private : " . $this->private . '<br>';
    }
 }