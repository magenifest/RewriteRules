<?php
/**
 * @author William Tran
 */

class Magenifest_RewriteRules_Controller_Router extends Mage_Core_Controller_Varien_Router_Abstract {

    /**
     * @param Zend_Controller_Request_Http $request
     * @return bool
     */
    public function match(Zend_Controller_Request_Http $request) {

        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('install'))->sendResponse();
            exit;
        }

        if (!$this->_getHelper()->getIsEnabled()) {
            return false;
        }

        try {
            $rewriteRules = $this->_getHelper()->getRules();
            $pathInfo = $this->_getHelper()->getFormattedUrl($request->getPathInfo());
            foreach ($rewriteRules as $rules) {
                $requestUrl = $rules['request'];
                if ($pathInfo === $requestUrl) {
                    $targetUrl = $rules['target'];
                    if ($targetUrl === 'home/home') {
                        $targetUrl = Mage::getBaseUrl();
                    }
                    Mage::app()->getFrontController()->getResponse()
                        ->setRedirect($targetUrl)
                        ->sendResponse();
                    $request->setDispatched(true);
                    return true;
                }
            }
        } catch (Exception $e) {
            Mage::logException($e);
        }
        return false;
    }

    /**
     * @return Mage_Core_Helper_Abstract|Magenifest_RewriteRules_Helper_Data
     */
    protected function _getHelper() {
        return Mage::helper('magenifest_rewriterules');
    }

}