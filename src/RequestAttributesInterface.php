<?php

declare(strict_types=1);

namespace Ruga\Request;

use Ruga\Db\Row\RowAttributesInterface;

/**
 * Interface RequestAttributesInterface
 *
 * @property int              $id                  Primary Key
 * @property string           $fullname            Full name / display
 * @property array            $party_role          Assigned party roles
 * @property PartySubtypeType $party_subtype       Type of the subtype (PERSON/ORGANIZATION)
 * @property string           $remark              Remark
 */
interface RequestAttributesInterface extends RowAttributesInterface
{
    
}