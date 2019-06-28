<?php
namespace App\Observers;

use App\Specialization;

class SpecializationObserver
{
    
    /**
     * Listen to the Specialization creating event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function creating(Specialization $Specialization)
    {
        //code...
    }

     /**
     * Listen to the Specialization created event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function created(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization updating event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function updating(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization updated event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function updated(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization saving event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function saving(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization saved event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function saved(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization deleting event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function deleting(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization deleted event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function deleted(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization restoring event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function restoring(Specialization $Specialization)
    {
        //code...
    }

    /**
     * Listen to the Specialization restored event.
     *
     * @param  Specialization  $Specialization
     * @return void
     */
    public function restored(Specialization $Specialization)
    {
        //code...
    }
}