<?php


namespace App;

class Example
{
    protected $collaborator;
    protected $foo;

//    public function __construct(Collaborator $collaborator)
    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }
/*    protected $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function go()
    {
        dump('it works!');
    }*/
}
