<?php
namespace App\Observers;

use App\Service;

class ServiceObserver
{
    
    /**
     * Listen to the Service creating event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function creating(Service $Service)
    {
        //code...
    }

     /**
     * Listen to the Service created event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function created(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service updating event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function updating(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service updated event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function updated(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service saving event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function saving(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service saved event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function saved(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service deleting event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function deleting(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service deleted event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function deleted(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service restoring event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function restoring(Service $Service)
    {
        //code...
    }

    /**
     * Listen to the Service restored event.
     *
     * @param  Service  $Service
     * @return void
     */
    public function restored(Service $Service)
    {
        //code...
    }
}