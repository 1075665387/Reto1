<?php
namespace Omnipro\Reto1\Model\ResourceModel\Reto1;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'blog_id';
    protected $_eventPrefix = 'omnipro_reto1_reto1_collection';
    protected $_eventObject = 'reto1_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Omnipro\Reto1\Model\Reto1', 'Omnipro\Reto1\Model\ResourceModel\Reto1');
    }
}
