<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger;

use JuriyPanasevich\Logger\Journal\AbstractJournal;
use JuriyPanasevich\Logger\Journal\AbstractJournalLog;

class Logger {

    protected $journal;

    public function __construct(AbstractJournal $journal) {
        $this->setJournal($journal);
    }

    public function log($message, $code = null) {
        return $this->getJournal()->log($message, $code);
    }

    public function logError($message) {
        return $this->getJournal()->log($message, AbstractJournalLog::CODE_ERROR);
    }

    /**
     * @return AbstractJournal
     */
    public function getJournal() {
        return $this->journal;
    }

    public function setJournal(AbstractJournal $journal) {
        $this->journal = $journal;
    }
}