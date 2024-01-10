<?php

use Lkn\HookNotification\Domains\Notifications\Messenger;
use Lkn\HookNotification\Notifications\WhatsApp\Invoice1DayFarway\Invoice1DayFarwayNotification;

Messenger::run(Invoice1DayFarwayNotification::class);
