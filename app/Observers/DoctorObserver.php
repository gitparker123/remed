<?php
namespace App\Observers;

use App\Doctor;

class DoctorObserver
{
    
    /**
     * Listen to the Doctor creating event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function creating(Doctor $Doctor)
    {
        //code...
    }

     /**
     * Listen to the Doctor created event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function created(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor updating event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function updating(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor updated event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function updated(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor saving event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function saving(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor saved event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function saved(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor deleting event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function deleting(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor deleted event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function deleted(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor restoring event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function restoring(Doctor $Doctor)
    {
        //code...
    }

    /**
     * Listen to the Doctor restored event.
     *
     * @param  Doctor  $Doctor
     * @return void
     */
    public function restored(Doctor $Doctor)
    {
        //code...
    }
}