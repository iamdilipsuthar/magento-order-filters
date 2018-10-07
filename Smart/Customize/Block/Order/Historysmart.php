<?php 

namespace Smart\Customize\Block\Order;
use Magento\Framework\View\Element\Template;

use \Magento\Framework\App\ObjectManager;
use \Magento\Sales\Model\ResourceModel\Order\CollectionFactoryInterface;


class Historysmart extends \Magento\Sales\Block\Order\History{
  public $orderCollectionFactory;
  public $_orderConfig;
  public function getOrderCollectionFactory()
  {
      if ($this->orderCollectionFactory === null) {
          $this->orderCollectionFactory = ObjectManager::getInstance()->get(CollectionFactoryInterface::class);
      }
      return $this->orderCollectionFactory;
  }
  
  public function getOrders()
  {
      $request = $this->getRequest();
      $status = $request->getParam('status');
      $orderStatus = $this->_orderConfig->getVisibleOnFrontStatuses();
      
      
        if($status != ''){
        
        
        if($status == 'all'){
          $status = $orderStatus;
        }else{
          if(in_array('pending',$orderStatus)){
            $index = array_search('pending',$orderStatus);
            unset($orderStatus[$index]);
          }
        
        }
        if (!($customerId = $this->_customerSession->getCustomerId())) {
            return false;
        }
        if (!$this->orders) {
        
            $this->orders = $this->getOrderCollectionFactory()->create($customerId)->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'status',
                ['in' =>array($status)]
            )->setOrder(
                'created_at',
                'desc'
            );
        }
        return $this->orders;
      }
      
  }
}