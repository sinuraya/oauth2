<?php

namespace Doctrine\DBAL\Logging;

class MonologSQLLogger implements SQLLogger
{

    public $logger;
    public $sql = "";
    public $start = null;

    public function __construct($logger = null)
    {
        $this->logger = $logger;
    }


    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->start = microtime(true);

        $this->sql = preg_replace_callback("/\?/", function ($matches) use (&$params, &$types) {
            $param = array_shift($params);
            if (null === $param) {
                return "NULL";
            } else {
                return "'" . $param . "'";
            }
        }, $sql);
    }

    public function stopQuery()
    {
        $elapsed = microtime(true) - $this->start;
        $this->sql .= " -- {$elapsed}";
        $this->logger->debug($this->sql);
    }
}
