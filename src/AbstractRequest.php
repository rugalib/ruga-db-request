<?php

declare(strict_types=1);

namespace Ruga\Request;

use Laminas\Db\Sql\Expression;
use Ruga\Db\Row\AbstractRugaRow;
use Ruga\Db\Row\Feature\FullnameFeatureRowInterface;
use Ruga\Request\Item\RequestItemTable;

/**
 * Abstract request.
 *
 * @see      Request
 * @see      RequestAttributesInterface
 * @author   Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
abstract class AbstractRequest extends AbstractRugaRow implements RequestAttributesInterface,
                                                                  RequestInterface,
                                                                  FullnameFeatureRowInterface
{
    /**
     * Constructs a display name from the given fields.
     * Fullname is saved in the row to speed up queries.
     *
     * @return string
     * @throws \Exception
     */
    public function getFullname(): string
    {
        return "" . parent::offsetGet('name');
    }
    
    
    
    /**
     * Find the next available sequence number for new REQUEST ITEMs.
     *
     * @return int
     */
    public function getNextSeq(): int
    {
        // always return 1 if REQUEST is not saved
        if ($this->isNew()) {
            return 1;
        }
        
        $adapter=$this->getTableGateway()->getAdapter();
        $requestItemTable = new RequestItemTable($adapter);
        $sql = $requestItemTable->getSql();
        $select = $sql->select();
        $select->columns(['maxseq' => new Expression('MAX(seq)')]);
        $select->where([
                           'Request_id' => $this->id,
                       ]);
        $sqlString=$sql->buildSqlString($select);
        \Ruga\Log::log_msg("SQL={$sqlString}");
    
        $ret = $adapter->query($sqlString)->execute();
        
        return ($ret->current()['maxseq'] ?? 0) + 1;
    }
    
}
