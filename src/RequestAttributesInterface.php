<?php
/*
 * SPDX-FileCopyrightText: 2023 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 * SPDX-License-Identifier: AGPL-3.0-only
 */

declare(strict_types=1);

namespace Ruga\Request;

use Ruga\Db\Row\RowAttributesInterface;

/**
 * Interface RequestAttributesInterface
 *
 * @property int                     $id                     Primary Key
 * @property string                  $fullname               Full name / display
 * @property RequestSubtype|null     $request_subtype        Subtype of the REQUEST
 * @property \DateTimeImmutable      $request_date           Date the REQUEST was submitted
 * @property \DateTimeImmutable|null $response_required_date Date until a response is required
 * @property int|null                $request_role           // TODO
 * @property string|null             $name                   Subject of the REQUEST
 * @property string|null             $description            Details of the REQUEST
 * @property string|null             $remark                 Remark
 */
interface RequestAttributesInterface extends RowAttributesInterface
{
    
}