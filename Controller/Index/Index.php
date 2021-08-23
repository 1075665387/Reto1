<?php
namespace Omnipro\Reto1\Controller\Index;

use Omnipro\Reto1\Model\Reto1Factory;

class Index implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_Reto1Factory;
    protected $_request;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Reto1Factory $Reto1F
    )
    {
        
        $this->_pageFactory = $pageFactory;
        $this->_Reto1Factory = $Reto1F;
        $this->_request = $request;
        
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $getp=$this->_request->getParams();
         //crar entrada en la tabla useropinion
         $pos = $this->_Reto1Factory->create(); //instancia user opinion
        
        if (!empty($getp)) {
            // Retrieve your form data
            $title  = $getp['title'];
            $content   = $getp['content'];
            $email = $getp['email'];
            $file   = $getp['file'];

           
            //manera 1 de enviar datos
            $pos->setData('title', $title);
            $pos->setData('content', $content);
            $pos->setData('image_path', $file);
            $pos->setData('email', $email);
            $pos->save();
        }
        return $this->_pageFactory->create();
    }
}
