<?php

namespace Terrificminds\CustomSurveyForm\Controller\Index;

use Terrificminds\CustomSurveyForm\Api\FormRepositoryInterface;
use Terrificminds\CustomSurveyForm\Api\Data\FormInterfaceFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\App\Response\RedirectInterface;


class Save extends Action
{
   /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var \Magento\Framework\Filesystem $filesystem
     */
    protected $filesystem;

    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory $fileUploader
     */
    protected $fileUploader;
    /**
     * @var FormRepositoryInterface
     */
    protected $FormRepository;
    /**
     * @var FormInterfaceFactory
     */
    private $FormFactory;

    protected $redirect;

    /**
     * Construct function
     *
     * @param Context $context
     * @param FormRepositoryInterface $FormRepository
     * @param FormInterfaceFactory $FormFactory
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        Context  $context,
        FormRepositoryInterface $FormRepository,
        FormInterfaceFactory $FormFactory,
        ManagerInterface $messageManager,
        Filesystem $filesystem,
        UploaderFactory $fileUploader
    ) {
        $logger->info("resulllt " . print_r('5',true));
        $this->messageManager       = $messageManager;
        $this->filesystem           = $filesystem;
        $this->fileUploader         = $fileUploader;
        $this->redirect = $redirect;

        $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);

        $this->FormRepository = $FormRepository;
        $this->FormFactory = $FormFactory;
        parent::__construct($context);
    }
    
    /**
     * Execute function
     *
     * @return url
     */
    public function execute()
    {
        $uploadedFile = $this->uploadFile();
        $params = $this->_request->getParams();
        $setProduct = $this->FormFactory ->create();
        $setProduct->setName($params['name']);
        $setProduct->setEmail($params['email']);
        $setProduct->setQuestion1($params['qn1']);
        $setProduct->setQuestion2($params['qn2']);
        $setProduct->setQuestion3($params['qn3']);
        

        try {
            $this->FormRepository->save($setProduct);
            $this->messageManager->addSuccessMessage(__("Data saved successfully. Thanks for the feedback."));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong"));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setUrl('https://app.exampleproject.test');
    }

 
    public function uploadFile()
        {
            // this folder will be created inside "pub/media" folder
            $yourFolderName = 'uploads/';


 
            // "upload_custom_file" is the HTML input file name
            $yourInputFileName = 'upload_custom_file';
 
            try{
            $file = $this->getRequest()->getFiles($yourInputFileName);
            $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;
 
            if ($file && $fileName) {
            $target = $this->mediaDirectory->getAbsolutePath($yourFolderName); 

 
            /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
            $uploader = $this->fileUploader->create(['fileId' => $yourInputFileName]);
 
            // set allowed file extensions
            $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
 
            // allow folder creation
            $uploader->setAllowCreateFolders(true);
 
            // rename file name if already exists 
            $uploader->setAllowRenameFiles(true); 

            $destFile = $target.'/'.$_FILES['upload_custom_file']['name'];

            $filename = $uploader->getNewFileName($destFile);

 

            // upload file in the specified folder
            $result = $uploader->save($target, $filename);
 
            //echo '<pre>'; print_r($result); exit;
            $path = $target . $filename;



            if ($result['file']) {
            $this->messageManager->addSuccess(__('File has been successfully uploaded.')); 
            return $path;
            }
            }
            } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            }

             return false;
        }
}