<?php

namespace Vdhicts\SVM\Enums;

enum PrivacyEnum: string
{
    case FullName = 'FULL_NAME';
    case FirstName = 'FIRST_NAME';
    case LastName = 'LAST_NAME';
    case Hidden = 'HIDDEN';
}
