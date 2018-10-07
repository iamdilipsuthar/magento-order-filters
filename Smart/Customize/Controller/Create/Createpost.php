<?php
 
namespace Smart\Customize\Controller\Create;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Framework\Exception\LocalizedException;


class Createpost extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
      $request = $this->getRequest();
      
      try {
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Name is missing'));
        }
      } catch (LocalizedException $e) {
          $this->messageManager->addErrorMessage($e->getMessage());

      } catch (\Exception $e) {

          $this->messageManager->addErrorMessage(
              __('An error occurred while processing your form. Please try again later.')
          );
        
      }
      
    
      echo 'param';
      
      $req = $request->getParams();
      print_r($req);
      die();
    }
}