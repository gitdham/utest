<?php
class CollectionTest extends \PHPUnit_Framework_TestCase {
  /** @test */
  public function test_empty_instantiated_collection_returns_no_items() {
    $collection = new \App\Support\Collection;

    $this->assertEmpty($collection->get());
  }
}
