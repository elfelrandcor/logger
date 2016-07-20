<?php
require_once __DIR__ . '/../vendor/autoload.php';

use JuriyPanasevich\Logger\Interfaces\JournalInterface;
use JuriyPanasevich\Logger\Journal\AbstractJournal;
use JuriyPanasevich\Logger\Journal\AbstractJournalLog;
use JuriyPanasevich\Logger\Logger;

/**
 * @author Juriy Panasevich <juriy.panasevich@gmail.com>
 */

class JournalTest extends PHPUnit_Framework_TestCase {

    public function testLog() {
        $journal = new JournalTest__Journal();
        $entity = new Entity();
        $entity->test = 'test';
        $journal->setEntity($entity);

        $logger = new Logger($journal);

        $log = $logger->log('test message', JournalTest__JournalLog::CODE_TEST);
        $this->assertEquals('test message', $log->getMessage());
        $this->assertEquals(JournalTest__JournalLog::CODE_TEST, $log->getCode());
        $this->assertEquals('test', $log->getJournal()->getEntity()->test);
    }


}

class Entity {

    protected $data;

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }
}

class JournalTest__Journal extends AbstractJournal {

    protected $entity;

    public function setEntity($entity) {
        $this->entity = $entity;
    }

    public function getEntity() {
        return $this->entity;
    }

    public function getJournalLog() {
        return new JournalTest__JournalLog();
    }

    public function save() {
        return true;
    }
}

class JournalTest__JournalLog extends AbstractJournalLog {

    const CODE_TEST = 100;

    protected $journal;

    public function getJournal() {
        return $this->journal;
    }

    public function setJournal(JournalInterface $journal) {
        $this->journal = $journal;
    }

    public function save() {
        return true;
    }
}