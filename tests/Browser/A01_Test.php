<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class A01_Test extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testFiles()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/files')
                    ->assertSee('Subir Archivos')
                    ->select('tipo', 'asamblea')
                    ->attach('archivo', storage_path('app/public/testing/test.pdf'))
                    ->click('#submit')
                    ->assertSee('Se ha grabado test.pdf en asamblea de forma exitosa')
                    ;
        });
        session()->flush();
    }
}
