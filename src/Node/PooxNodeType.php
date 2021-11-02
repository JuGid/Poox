<?php 

namespace Poox\Node;

abstract class PooxNodeType {
    public const NONE = '';
    public const INSIDE = ' ';
    public const WITH = '.';
    public const AND = ',';
    public const PARENT = '>';
    public const IMMEDIATELY = '+';
    public const PRECEDENCE = '~';
}