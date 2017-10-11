<?php
/**
 * @author William Tran
 */
class Magenifest_RewriteRules_Block_Adminhtml_Block_System_Config_Form_Field_Rewriterules extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract {

    /**
     * Magenifest_RewriteRules_Block_Adminhtml_Block_System_Config_Form_Field_Rewriterules constructor.
     */
    public function __construct() {
        $this->addColumn('request', array(
            'label' =>  Mage::helper('adminhtml')->__('Request'),
            'style' =>  'width:250px',
            'class' =>  'required-entry validate-identifier'
        ));
        $this->addColumn('target', array(
            'label' => Mage::helper('adminhtml')->__('Target'),
            'style' => 'width:250px',
            'class' =>  'required-entry validate-identifier'
        ));
        $this->_addAfter = true;
        $this->_addButtonLabel = Mage::helper('magenifest_rewriterules')->__('Add rule');
        parent::__construct();
    }

}