<?php

declare(strict_types=1);

namespace Ruga\Request\Test;

use Ruga\Party\Party;
use Ruga\Party\PartyTable;
use Ruga\Request\PartyRole\RequestHasPartyRole;
use Ruga\Request\Request;
use Ruga\Request\RequestTable;
use SebastianBergmann\CodeCoverage\Report\PHP;

/**
 * @author                 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestHasPartyTest extends \Ruga\Request\Test\PHPUnit\AbstractTestSetUp
{
    
    public function testCanReadOriginatorOrResponder(): void
    {
        $requestTable = new \Ruga\Request\RequestTable($this->getAdapter());
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(1)->current();
        $this->assertInstanceOf(Request::class, $request);
        
        echo "Request: {$request->idname}" . PHP_EOL;
        
        $originators = $request->findPartyByRole(RequestHasPartyRole::ORIGINATOR());
        $this->assertCount(1, $originators);
        /** @var Party $party */
        $party = $originators->current();
        echo "ORIGINATOR: {$party->idname}" . PHP_EOL;
        $this->assertEquals(3, $party->id);
        
        $responders = $request->findPartyByRole(RequestHasPartyRole::RESPONDER());
        $this->assertCount(1, $responders);
        /** @var Party $party */
        $party = $responders->current();
        echo "RESPONDER: {$party->idname}" . PHP_EOL;
        $this->assertEquals(1, $party->id);
    }
    
    
    
    public function testCanRemoveOriginator(): void
    {
        $requestTable = new \Ruga\Request\RequestTable($this->getAdapter());
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(1)->current();
        $this->assertInstanceOf(Request::class, $request);
        
        print_r($request->idname);
        echo PHP_EOL;
        
        $parties = $request->findPartyByRole(RequestHasPartyRole::ORIGINATOR());
        $this->assertCount(1, $parties);
        /** @var Party $party */
        $party = $parties->current();
        print_r($party->idname);
        echo PHP_EOL;
        $this->assertEquals(3, $party->id);
        
        $ret = $request->unlinkParty($party, RequestHasPartyRole::ORIGINATOR());
        
        $this->assertTrue($ret);
    }
    
    
    
    public function testCanAddOriginator(): void
    {
        /** @var Request $request */
        $request = $this->getAdapter()->rowFactory(2, RequestTable::class);
        $this->assertInstanceOf(Request::class, $request);
        echo "{$request->idname}" . PHP_EOL;
        
        /** @var Party $party */
        $party = $this->getAdapter()->rowFactory(4, PartyTable::class);
        $this->assertInstanceOf(Party::class, $party);
        
        $link = $request->linkParty($party, RequestHasPartyRole::ORIGINATOR());
        $link->save();
    
    
        $originators = $request->findPartyByRole(RequestHasPartyRole::ORIGINATOR());
        $this->assertCount(1, $originators);
        /** @var Party $party */
        $party = $originators->current();
        echo "ORIGINATOR: {$party->idname}" . PHP_EOL;
        $this->assertEquals(4, $party->id);
    }
    
}
