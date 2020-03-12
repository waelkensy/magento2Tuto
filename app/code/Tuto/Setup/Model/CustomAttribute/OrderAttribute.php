<?php

namespace Tuto\Setup\Model\CustomAttribute;

use Magento\Sales\Setup\SalesSetupFactory;

/**
 * Class OrderAttribute
 *
 * @author Yannick Waelkens <yannick.waelkens@cgi.com>
 */
class OrderAttribute
{

    /**
     * @var SalesSetupFactory
     */
    private $salesSetupFactory;

    public function __construct(SalesSetupFactory $salesSetupFactory)
    {
        $this->salesSetupFactory = $salesSetupFactory;
    }

    public function addOrderAttribute()
    {
        $salesSetup = $this->salesSetupFactory->create();
        $salesSetup->addAttribute(
            'order',
            'custom_attribute',
            ['type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT]
        );
    }
}

