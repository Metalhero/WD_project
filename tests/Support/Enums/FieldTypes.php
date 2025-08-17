<?php

namespace Tests\Support\Enums;

enum FieldTypes: string
{
    case TEXT = 'TEXT';
    case TEXTAREA = 'TEXTAREA';
    case NUMBER = 'NUMBER';
    case EMAIL = 'EMAIL';
    case DROPDOWN = 'DROPDOWN';
    case LOOKUP = 'LOOKUP';
    case CHECKBOX = 'CHECKBOX';
    case PASSWORD = 'PASSWORD';
    case DATE = 'DATE';
}
