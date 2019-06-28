<?php
namespace App\Observers;

use App\Test;

class TestObserver
{
    
    /**
     * Listen to the Test creating event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function creating(Test $Test)
    {
        //code...
    }

     /**
     * Listen to the Test created event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function created(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test updating event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function updating(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test updated event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function updated(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test saving event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function saving(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test saved event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function saved(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test deleting event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function deleting(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test deleted event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function deleted(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test restoring event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function restoring(Test $Test)
    {
        //code...
    }

    /**
     * Listen to the Test restored event.
     *
     * @param  Test  $Test
     * @return void
     */
    public function restored(Test $Test)
    {
        //code...
    }
}