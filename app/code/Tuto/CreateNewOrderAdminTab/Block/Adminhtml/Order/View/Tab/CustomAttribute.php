<?php

namespace Tuto\CreateNewOrderAdminTab\Block\Adminhtml\Order\View\Tab;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\Registry;
use Magento\Sales\Model\Order;

/**
 * Class CustomAttribute
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class CustomAttribute extends Template implements TabInterface
{
    /**
     * Template
     *
     * @var string
     */
    protected $_template = 'Tuto_CreateNewOrderAdminTab::order/view/tab/custom_attribute.phtml';

    /**
     * @var Registry
     */
    private $_coreRegistry;

    public function __construct(
        Template\Context $context,
        array $data = [],
        Registry $registry
    ) {
        parent::__construct($context, $data);
        $this->_coreRegistry = $registry;
    }

    /**
     * @inheritDoc
     */
    public function getTabLabel()
    {
        return __('Custom Attribute');
    }

    /**
     * @inheritDoc
     */
    public function getTabTitle()
    {
        return __('Custom Attribute');
    }

    /**
     * @inheritDoc
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Retrieve order model instance
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }
}
