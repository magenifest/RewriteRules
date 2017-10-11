<?php
/**
 * @author William Tran
 */

class Magenifest_RewriteRules_Model_Adminhtml_System_Config_Backend_Json_Array extends Mage_Core_Model_Config_Data {

    /**
     * Decode value for displaying in admin config
     */
    protected function _afterLoad() {
        if (!is_array($this->getValue())) {
            $jsonValue = $this->getValue();
            $decodedValue = false;
            if (!empty($jsonValue)) {
                try {
                    $decodedValue = Mage::helper('core')->jsonDecode($jsonValue, Zend_Json::TYPE_ARRAY);
                } catch (Exception $e) {
                    Mage::logException($e);
                }
            }
            $this->setValue($decodedValue);
        }
    }

    /**
     * Perform sanity check and format input
     */
    protected function _beforeSave() {
        $value = $this->getValue();
        if (is_array($value)) {
            unset($value['__empty']);
        }
        foreach ($value as $key => $content) {
            $value[$key]['target'] = $this->_getHelper()->getFormattedUrl($value[$key]['target']);
            $value[$key]['request'] = $this->_getHelper()->getFormattedUrl($value[$key]['request']);
            if (!isset($content['target']) || !isset($content['request']) || !$content['target'] || !$content['request']) {
                unset($value[$key]);
            }
        }
        $this->setValue($value);
        if (is_array($this->getValue())) {
            $this->setValue(Mage::helper('core')->jsonEncode($this->getValue()));
        }
    }

    protected function _getHelper() {
        return Mage::helper('magenifest_rewriterules');
    }

}
