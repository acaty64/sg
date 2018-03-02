<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\PdfToText\Pdf;

class IndexPDFTest extends TestCase
{

    /** @test     */
    public function searchText()
    {

        $rpta = $this->get('/api/pdf/consejo');
        $this->assertTrue($rpta->baseResponse->original['success']);

    }
}
