<?php

declare(strict_types = 1);

namespace Telegram\API;

use Telegram\API\Method\GetMe;
use Telegram\API\Type\User;
use Telegram\LogHelpers;

class Bot implements LogHelpers\Interfaces\ILoggerAwareInterface {

    use LogHelpers\Traits\TLoggerTrait;
    
    /**
     * The token used to identify the bot
     * @var string
     */
    private $_token = NULL;
    private $_me = NULL;

    protected static $_ConnectionRetryTimeout = 120;

    public function __construct(string $token = NULL) {
        if ($token !== NULL) {
            $this->_token = $token;
        }
        $getMe = new GetMe;
        do {
            $this->_me = $getMe->call($this);
            if (!$this->_me instanceof User) {
                $this->alert("'Me' is not an instance of User! Telegram api might be down... retrying in " . static::$_ConnectionRetryTimeout . ' seconds...');
                sleep(static::$_ConnectionRetryTimeout);
            }
        } while (!$this->_me instanceof User);
    }

    public function setToken(string $token) {
        $this->_token = $token;
    }

    public function getToken() : string {
        return $this->_token;
    }

    public function call(string $method, Base\Abstracts\ABaseObject $payload) {
        $this->logDebug('Calling method: ' . $method, $this->getLoggerContext());
        return API::CallMethod($method, $this, $payload);
    }

    public function getMe() : User {
        return $this->_me;
    }

    public function getUsername() : string {
        if (isset($this->_me)) {
            return $this->_me->getUsername();
        } else {
            return '';
        }
    }

    public function getLoggerContext() : array {
        $username = $this->getUsername();
        if (empty($username)) {
            $username = 'UNKNOWN-BOT';
        }
        return ['botname' => $username];
    }

    public static function SetConnectionRetryTimeout(int $timeoutinSeconds) {
        static::$_ConnectionRetryTimeout = $timeoutinSeconds;
    }
}
