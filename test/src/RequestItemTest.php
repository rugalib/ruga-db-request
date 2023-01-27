<?php

declare(strict_types=1);

namespace Ruga\Request\Test;

use Laminas\ServiceManager\ServiceManager;
use Ruga\Request\Item\RequestItem;
use Ruga\Request\Item\RequestItemTable;
use Ruga\Request\Request;
use Ruga\Request\RequestSubtype;
use Ruga\Request\RequestTable;

/**
 * @author                 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestItemTest extends \Ruga\Request\Test\PHPUnit\AbstractTestSetUp
{
    public function testCanCreateRequestItemButNotSave()
    {
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $this->expectException(\Laminas\Db\Adapter\Exception\InvalidQueryException::class);
        $requestItem->save();
    }
    
    
    public function testCanCreateRequestItemButNotSaveWithoutRequest()
    {
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $requestItem->Request_id=999;
        $requestItem->seq=1;
        $this->expectException(\Laminas\Db\Adapter\Exception\InvalidQueryException::class);
        $requestItem->save();
    }
    
    
    public function testCanCreateRequestItemAndSave()
    {
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $requestItem->Request_id=1;
        $requestItem->seq=2;
        $requestItem->save();
    }
    
    public function testCanNotCreateRequestItemWithDupSeq()
    {
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $requestItem->Request_id=1;
        $requestItem->seq=1;
        $this->expectException(\Laminas\Db\Adapter\Exception\InvalidQueryException::class);
        $requestItem->save();
    }
    
    
    public function testCanCreateRequestItemAndLinkToExistingRequest()
    {
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(2)->current();
        $this->assertInstanceOf(Request::class, $request);
        
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $requestItem->Request_id=$request->id;
        $requestItem->seq=$request->getNextSeq();
        $requestItem->save();
    }
    
    
    public function testCanAddRequestItemAtEnd()
    {
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(2)->current();
        $this->assertInstanceOf(Request::class, $request);
    
        $requestItemTable = new RequestItemTable($this->getAdapter());
        /** @var RequestItem $requestItem */
        $requestItem = $requestItemTable->createRow();
        $this->assertInstanceOf(RequestItem::class, $requestItem);
        $requestItem->linkTo($request);
        $requestItem->save();
    }
    
}
