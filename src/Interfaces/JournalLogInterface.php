<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Interfaces;

interface JournalLogInterface {

    public function setJournal(JournalInterface $journal);

    /**
     * @return JournalInterface
     */
    public function getJournal();
    public function save();
}