<?php

namespace Tuto\Setup\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Sales\Setup\SalesSetupFactory;
use Tuto\Setup\Model\CustomAttribute\OrderAttribute;
use Tuto\Setup\Model\EavAttribute\CategoryAttribute;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * @var SalesSetupFactory
     */
    private $salesSetupFactory;
    /**
     * @var OrderAttribute
     */
    private $orderModelAttribute;
    /**
     * @var CategoryAttribute
     */
    private $categoryModelAttribute;

    /**
     * UpgradeData constructor.
     *
     * @param SalesSetupFactory $salesSetupFactory
     * @param OrderAttribute    $orderModelAttribute
     * @param CategoryAttribute $categoryModelAttribute
     */
    public function __construct(
        SalesSetupFactory $salesSetupFactory,
        OrderAttribute $orderModelAttribute,
        CategoryAttribute $categoryModelAttribute
    ) {
        $this->salesSetupFactory      = $salesSetupFactory;
        $this->orderModelAttribute    = $orderModelAttribute;
        $this->categoryModelAttribute = $categoryModelAttribute;
    }

    /**
     * @inheritDoc
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->orderModelAttribute->addOrderAttribute();
            $this->categoryModelAttribute->addCategoryAttribute($setup);
        }
        $setup->endSetup();
    }
}
