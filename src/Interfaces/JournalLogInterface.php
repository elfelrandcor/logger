<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Interfaces;

interface JournalLogInterface {

    public function find();
    public function save();
}