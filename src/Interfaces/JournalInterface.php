<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Interfaces;


interface JournalInterface {

    /**
     * @return JournalLogInterface
     */
    public function getJournalLog();
    public function save();
}