<?php
namespace Omnipro\Reto1\Model\ResourceModel;

class Reto1 extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('omnipro_blog', 'blog_id');
    }
}
