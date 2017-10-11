<?php
/**
 * @author: William Tran
 */
class Magenifest_RewriteRules_Model_Observers_InitRouter {

    /**
     * @param $observer
     */
    public function handle($observer) {
        if (Mage::helper('magenifest_rewriterules')->getIsEnabled()) {
            /* @var $front Mage_Core_Controller_Varien_Front */
            $front = $observer->getEvent()->getFront();
            $front->addRouter('rewriterules', new Magenifest_RewriteRules_Controller_Router());
        }
    }

}