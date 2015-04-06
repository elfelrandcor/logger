<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Journal;

use JuriyPanasevich\Logger\Interfaces\JournalLogInterface;

abstract class AbstractJournalLog implements JournalLogInterface {

    const CODE_ERROR = 9000;

    protected $message;
    protected $code;

    /**
     * @return AbstractJournal
     */
    abstract public function getJournal();
    abstract public function setJournal(AbstractJournal $journal);

    public static function getStatusCodeLabels() {
        return [
            self::CODE_ERROR => 'Ошибка',
        ];
    }

    /**
     * @param AbstractJournal $journal
     * @return AbstractJournalLog
     */
    public static function createModel(AbstractJournal $journal) {
        $log = new static();
        $log->setJournal($journal);
        return $log;
    }

    /**
     * @param string $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code) {
        $this->code = $code;
    }
}