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
    
    
    
    /**
     * Creates new REQUESTs and saves them without setting data.
     */
    public function testCanCreateRequest()
    {
        $requestTable = new \Ruga\Request\RequestTable($this->getAdapter());
        /** @var Request $request */
        $request = $requestTable->createRow(['request_date' => '2023-01-01']);
//        $this->assertInstanceOf(\Ruga\Party\Link\AbstractLinkParty::class, $request->getSubtypeLink());
//        $this->assertInstanceOf(\Ruga\Party\Subtype\SubtypeRowInterface::class, $request->getSubtype());
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
        /*
        $request = $requestTable->createRow(['party_subtype' => \Ruga\Party\PartySubtypeType::ORGANIZATION]);
        $this->assertInstanceOf(\Ruga\Party\Link\Organization\PartyHasOrganization::class, $request->getSubtypeLink());
        $this->assertInstanceOf(\Ruga\Party\Subtype\Organization\Organization::class, $request->getSubtype());
        $request->save();
        
        $request = $requestTable->createRow(['party_subtype' => \Ruga\Party\PartySubtypeType::PERSON]);
        $this->assertInstanceOf(\Ruga\Party\Link\Person\PartyHasPerson::class, $request->getSubtypeLink());
        $this->assertInstanceOf(\Ruga\Party\Subtype\Person\Person::class, $request->getSubtype());
        $request->save();
        */
    }
    
}
