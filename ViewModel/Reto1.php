<?php
namespace Omnipro\Reto1\ViewModel;

class Reto1 implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
        protected $curl;

        public function __construct(
            \Magento\Framework\HTTP\Client\Curl $curl
        )
        {
            $this->curl = $curl;
        }
    
        public function getCharacters(){
            $this->curl->get('https://rickandmortyapi.com/api/character/');
            //return $this->curl->getBody();
            return json_decode($this->curl->getBody(), true);
        }
 }
