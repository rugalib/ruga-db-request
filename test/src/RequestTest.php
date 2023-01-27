<?php

declare(strict_types=1);

namespace Ruga\Request\Test;

use Laminas\ServiceManager\ServiceManager;
use Ruga\Request\Request;
use Ruga\Request\RequestSubtype;
use Ruga\Request\RequestTable;

/**
 * @author                 Roland Rusch, easy-smart solution GmbH <roland.rusch@easy-smart.ch>
 */
class RequestTest extends \Ruga\Request\Test\PHPUnit\AbstractTestSetUp
{
    public function testCanSetContainer(): void
    {
        $this->expectNotToPerformAssertions();
    }
    
    
    
    public function testCanCreateRequest()
    {
        $requestTable = new \Ruga\Request\RequestTable($this->getAdapter());
        /** @var Request $request */
        $request = $requestTable->createRow(['request_date' => '2023-01-01']);
        $request->save();
        $this->assertInstanceOf(\Ruga\Request\Request::class, $request);
        
        $request = $requestTable->createRow();
        $request->save();
        $this->assertInstanceOf(\Ruga\Request\Request::class, $request);
        
        $request = $requestTable->createRow(
            ['request_date' => (new \DateTime())->setTime(0, 0, 0, 0), 'request_subtype' => 'RFI']
        );
        $request->save();
        $this->assertInstanceOf(\Ruga\Request\Request::class, $request);
        
        /** @var Request $request */
        $request = $requestTable->createRow();
        $request->request_date = (new \DateTime())->setTime(0, 0, 0, 0);
        $request->request_subtype = RequestSubtype::RFP();
        $request->save();
        $this->assertInstanceOf(\Ruga\Request\Request::class, $request);
    }
    
    
    public function testCanFindNextAvailableSeq()
    {
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(1)->current();
        $this->assertInstanceOf(Request::class, $request);
        print_r($request->uniqueid);
        echo PHP_EOL;
        $nextSeq=$request->getNextSeq();
        echo "getNextSeq(): ";
        print_r($nextSeq);
        echo PHP_EOL;
        $this->assertEquals(2, $nextSeq);
    
        
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(2)->current();
        $this->assertInstanceOf(Request::class, $request);
        print_r($request->uniqueid);
        echo PHP_EOL;
        $nextSeq=$request->getNextSeq();
        echo "getNextSeq(): ";
        print_r($nextSeq);
        echo PHP_EOL;
        $this->assertEquals(5, $nextSeq);
    
    
        /** @var Request $request */
        $request = (new RequestTable($this->getAdapter()))->findById(3)->current();
        $this->assertInstanceOf(Request::class, $request);
        print_r($request->uniqueid);
        echo PHP_EOL;
        $nextSeq=$request->getNextSeq();
        echo "getNextSeq(): ";
        print_r($nextSeq);
        echo PHP_EOL;
        $this->assertEquals(1, $nextSeq);
    
    }
}
