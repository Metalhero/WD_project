<?php 

namespace Tests\Support\Enums;

enum Core: string
{
    case TEXT = 'TEXT';
    case NUMBER = 'NUMBER';
    case EMAIL = 'EMAIL'; 
    case DROPDOWN = 'DROPDOWN'; 
    case LOOKUP = 'LOOKUP'; 
    case CHECKBOX = 'CHECKBOX'; 
    case PASSWORD = 'PASSWORD';
    case DATE = 'DATE';
}