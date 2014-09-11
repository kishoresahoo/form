<?php namespace AdamWathan\Form\OldInput;

use Illuminate\Session\Store as Session;

class IlluminateOldInputProvider implements OldInputInterface
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function hasOldInput($key)
    {
        return $this->session->hasOldInput($this->transformKey($key));
    }

    public function getOldInput($key)
    {
        return $this->session->getOldInput($this->transformKey($key));
    }

    protected function transformKey($key)
    {
        return str_replace(array('.', '[]', '[', ']'), array('_', '', '.', ''), $key);
    }
}
