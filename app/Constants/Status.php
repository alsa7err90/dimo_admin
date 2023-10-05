<?php

namespace App\Constants;

class Status
{

	const ENABLE  = 1;
	const DISABLE = 0;

	const SELECTED  = 1;
	const NOT_SELECTED = 0;

	const YES = 1;
	const NO  = 0;

	const VERIFIED   = 1;
	const UNVERIFIED = 0;

	const PAYMENT_INITIATE = 0;
	const PAYMENT_SUCCESS  = 1;
	const PAYMENT_PENDING  = 2;
	const PAYMENT_REJECT   = 3;

	const TICKET_OPEN   = 0;
	const TICKET_ANSWER = 1;
	const TICKET_REPLY  = 2;
	const TICKET_CLOSE  = 3;


	const TICKET_0   = "OPEN";
	const TICKET_1 = "ANSWER";
	const TICKET_2  = "REPLY";
	const TICKET_3  = "CLOSE";

	const LOW    = 1;
	const MEDIUM = 2;
	const HIGH   = 3;

	const USER_ACTIVE = 1;
	const USER_BAN    = 0;

	const PENDING    = 0;
	const PROCESSING = 1;
	const COMPLETED  = 2;
	const CANCELLED  = 3;
	const REFUNDED   = 4;


	const MAX_FILES_UPLOAD = 0;

    const PUBLISHED = 1;
    const DRAFT = 0;

    const CACHE  = 1440;  // ONE DAY

}
