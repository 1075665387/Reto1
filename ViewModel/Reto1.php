<?php
namespace Omnipro\Reto1\ViewModel;

use Omnipro\Reto1\Model\Reto1Factory;
//use \Magento\User\Model\UserFactory;
class Reto1 implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
        //protected $curl;
        protected $_Reto1Factory;
        //protected $_UserFactory;
        public function __construct(
            //\Magento\Framework\HTTP\Client\Curl $curl,
            Reto1Factory $Reto1F
            //UserFactory $UserFactory
        )
        {
            //$this->curl = $curl;
            $this->_Reto1Factory = $Reto1F;
            //$this->_UserFactory=$UserFactory;

        }
    
        public function getDat(){
            $colections=$this->_Reto1Factory->create();
            //return $this->curl->getBody();
            return $colections->getCollection()->setOrder('fecha','DESC');;
        }

        /*public function getUser(){
            $userF=$this->_UserFactory->create();
            return $userF->getCollection();
        }*/
 }
