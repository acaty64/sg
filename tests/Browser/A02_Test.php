<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class A02_Test extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testActas()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/actas')
                    ->assertSee('Búsqueda de Actas')
                    ->select('#sel_tipo', 'asamblea')
                    ->type('#xtexto', 'ARCHIVO PDF DE PRUEBA.')
                    ->click('#submit')
                    ->waitForText('test.pdf',10)
                    ->clickLink('test.pdf')
                    //->waitFor('#pdfView',30)
                    ;
        });
        session()->flush();
    }
}
