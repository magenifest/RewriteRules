<?php
/**
 * @author: William Tran
 */ 
class Magenifest_RewriteRules_Helper_Data extends Mage_Core_Helper_Abstract {

   const XML_PATH_ENABLE = 'rewrite_rules/general/enable';
   const XML_PATH_RULES = 'rewrite_rules/general/rules';

    /**
     * @return bool
     */
   public function getIsEnabled() {
       return Mage::getStoreConfigFlag(self::XML_PATH_ENABLE);
   }

    /**
     * @return mixed
     */
   public function getRules() {
       $rules = Mage::helper('core')->jsonDecode(Mage::getStoreConfig(self::XML_PATH_RULES));
       return $rules;
   }

   public function getFormattedUrl($url) {
       return strtolower(trim($url, " \t\n\r\0\x0B\/"));
   }

}