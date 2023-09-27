<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request;

/**
 * Interface to a request.
 *
 * @see      Request
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
interface RequestInterface extends RequestAttributesInterface
{
    /**
     * Find the next available sequence number for new REQUEST ITEMs.
     *
     * @return int
     */
    public function getNextSeq(): int;

}
