<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Spatie\PdfToText\Pdf;
use Tests\TestCase;

class A01_SearchInPDFTest extends TestCase
{

    /** @test     */
    public function searchText()
    {
        $request = [
                'carpeta' => 'asamblea',
                'texto'   => 'Macedo'
            ];
        $rpta = $this->post('/api/pdf', $request);

        $this->assertTrue($rpta->baseResponse->original['success']);
    }
}
