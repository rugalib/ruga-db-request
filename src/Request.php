<?php

declare(strict_types=1);

namespace Ruga\Request;

/**
 * Implements the REQUEST entity.
 * Instead of immediately ordering the products on a requirement, sometimes a process of requesting and receiving
 * quotes is used. A REQUEST is a means of asking vendors for bids, quotes, or responses to the requirement. The
 * REQUEST could be sent to the enterprise, or it could be sent out from the enterprise to solicit responses from
 * suppliers.
 *
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class Request extends AbstractRequest implements RequestInterface
{
}
