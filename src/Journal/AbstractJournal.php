<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Journal;

use JuriyPanasevich\Logger\Exceptions\JournalException;
use JuriyPanasevich\Logger\Interfaces\JournalInterface;

/**
 * Class AbstractJournal
 * @package JuriyPanasevich\Logger\Journal
 * @method AbstractJournalLog getJournalLog()
 */
abstract class AbstractJournal implements JournalInterface {

    abstract public function setEntity($entity);
    abstract public function getEntity();

    /**
     * @param $entity
     * @return AbstractJournal
     * @throws JournalException
     */
    public static function createModel($entity) {
        $journal = new static();
        $journal->setEntity($entity);
        if (!$journal->save()) {
            throw new JournalException('Failed on journal save');
        }
        return $journal;
    }

    public function log($message, $code = null) {
        $log = $this->getJournalLog()->createModel($this);
        $log->setMessage($message);
        $code && $log->setCode($code);
        if (!$log->save()) {
            throw new JournalException('Failed on journal log save');
        }
        return $log;
    }
}