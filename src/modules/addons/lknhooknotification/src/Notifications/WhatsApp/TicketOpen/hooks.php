<?php

use Lkn\HookNotification\Domains\Notifications\Messenger;
use Lkn\HookNotification\Notifications\WhatsApp\TicketOpen\TicketOpenNotification;

Messenger::run(TicketOpenNotification::class);
