<?php

    namespace Core\HTML;

    /**
     * class Form
     * Permet de générer un formulaire rapidement et simplement
     */
    class Form{

        /**
         * @var array $data Données utilisées par le formulaire
         */
        protected $data;
        
        /**
         * @var string Tag utilisées pour entourées les champs.
         */
        public $surround = 'p';

        /**
         * @param array $data Données utilisées par le formulaire.
         */
        public function __construct($data = array()){
            $this->data = $data; 
        }

        /**
         * @param $html string Code HTML a entourner
         * @return string
         */
        protected function surround($html){
            return "<{$this->surround}>{$html}</{$this->surround}>";
        }

        /**
         * @param $index string index d'un tableau ou $_POST de l'objet new form.
         * @return string
         */
        protected function getValue($index){
            if(is_object($this->data)){
                return $this->data->$index;
            }
                return isset($this->data[$index]) ? $this->data[$index] : null;
        }

        /**
         * @param $name string, $label, array $options
         * @return string
         */
        public function input($name, $label, $options = []){
            $type = isset($options['type']) ? $options['type'] : 'text';
            return $this->surround(
                '<input type="' . $type . '" name="'.$name .'" value="'. $this->getValue($name) .'">');
        }

        /**
         * @return string
         */
        public function submit(){
            return $this->surround('<button type="submit">Envoyer</button>');
        }
        
    }

?>