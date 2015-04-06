<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger;

use JuriyPanasevich\Logger\Journal\AbstractJournal;
use JuriyPanasevich\Logger\Journal\AbstractJournalLog;

class Logger {

    protected $journal;

    public function __construct($classname) {
        /** @var AbstractJournal $journal */
        $journal = new $classname();
        $this->setJournal($journal);
    }

    public function log($message, $code = null) {
        $this->getJournal()->log($message, $code);
    }

    public function logError($message) {
        $this->getJournal()->log($message, AbstractJournalLog::CODE_ERROR);
    }

    /**
     * @return AbstractJournal
     */
    public function getJournal() {
        return $this->journal;
    }

    /**
     * @param AbstractJournal $journal
     */
    public function setJournal(AbstractJournal $journal) {
        $this->journal = $journal;
    }
}