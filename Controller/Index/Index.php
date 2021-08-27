<?php

namespace Omnipro\Reto1\Controller\Index;

use Omnipro\Reto1\Model\Reto1Factory;
use \Magento\User\Model\UserFactory;
//use Magento\Framework\App\Filesystem\DirectoryList;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_Reto1Factory;
    protected $_request;
    protected $_UserFactory;
    
    //para subir imagen
    protected $_fileUploaderFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */

     /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,

        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Reto1Factory $Reto1F,
        UserFactory $UserFactory
    
        //\Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory
    ) {

        $this->_pageFactory = $pageFactory;
        $this->_Reto1Factory = $Reto1F;
        $this->_request = $request;
        $this->_UserFactory=$UserFactory;
        return parent::__construct($context);
    
        //$this->_fileUploaderFactory = $fileUploaderFactory;
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        
        $getp = $this->_request->getPost();
        //crar entrada en la tabla useropinion
        $pos = $this->_Reto1Factory->create(); //instancia user opinion
        $userF=$this->_UserFactory->create();
        $userF=$userF->getCollection()->addFieldToFilter('email', 'elkin.pulido@omni.pro');
        $file= $userF->getItems();
        //echo $file;
        /*foreach($userF->getItems() as $item){
			
			print_r($item->getCorreo());
			
		}*/

        if (!empty($getp)) {
            // Retrieve your form data
            $title  = $getp['title'];
            $content   = $getp['content'];
            $email = $getp['email'];
            //$file   = $getp['file'];

            //calidar correo administrador 
            
            

            //manera 1 de enviar datos
            $pos->setData('title', $title);
            $pos->setData('content', $content);
            //$pos->setData('image_path', $file);
            $pos->setData('email', $email);
            $pos->save();
            /*
            $uploader = $this->_fileUploaderFactory->create(['fileId' => $file]);
            $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
            $uploader->setAllowRenameFiles(false);
            $uploader->setFilesDispersion(false);
            $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('imagenes/');
            $uploader->save($path);*/

            
        }
        return $this->_pageFactory->create();
    }

}
