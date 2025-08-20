<?php
/**
 * Copyright © Ronangr1. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Ronangr1\Ringado\ViewModel\Widget;

use Magento\Csp\Helper\CspNonceProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Config implements ArgumentInterface
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
        private readonly CspNonceProvider $cspNonceProvider,
    ) {
    }

    public function getWidgetUrl(): string
    {
        return 'https://widget.ringado.com/ringado-chat-widget.js';
    }

    public function getOperatorId(): string
    {
        return $this->scopeConfig->getValue('ringado/general/operator_id') ?: "";
    }

    public function getNonce(): string
    {
        return $this->cspNonceProvider->generateNonce();
    }
}
