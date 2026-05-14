<?php

namespace App\Exceptions;

use Exception;

class MentoringOverlapException extends Exception
{
    protected $message = 'Mentor sudah memiliki sesi pada waktu yang dipilih.';
}
