<?php
/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

namespace JuriyPanasevich\Logger\Interfaces;


interface JournalInterface {

    public function find();
    public function save();
}