<?php
namespace App\Observers;

use App\Appointment;

class AppointmentObserver
{
    
    /**
     * Listen to the Appointment creating event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function creating(Appointment $Appointment)
    {
        //code...
    }

     /**
     * Listen to the Appointment created event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function created(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment updating event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function updating(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment updated event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function updated(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment saving event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function saving(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment saved event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function saved(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment deleting event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function deleting(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment deleted event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function deleted(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment restoring event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function restoring(Appointment $Appointment)
    {
        //code...
    }

    /**
     * Listen to the Appointment restored event.
     *
     * @param  Appointment  $Appointment
     * @return void
     */
    public function restored(Appointment $Appointment)
    {
        //code...
    }
}