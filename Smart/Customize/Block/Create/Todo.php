<?php
namespace Smart\Customize\Block\Create;
 
class Todo extends \Magento\Framework\View\Element\Template
{
    protected $_productCollectionFactory;
    public function __construct(
       \Magento\Backend\Block\Template\Context $context,        
       \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,        
       array $data = []
    )
    {    
       $this->_productCollectionFactory = $productCollectionFactory;    
       parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        return $this->getUrl('smart/create/createPost', ['_secure' => true]);
    }
  
}