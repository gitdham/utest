<?php
class UserTest extends \PHPUnit_Framework_TestCase {
  protected $user;

  public function setUp() {
    $this->user = new \App\Models\User;
  }

  /** @test */
  public function test_that_we_can_get_the_first_name() {
    $this->user->setFirstName("Billy");
    $this->assertEquals($this->user->getFirstName(), "Billy");
  }

  public function test_that_we_can_get_the_last_name() {
    $this->user->setLastName("Wonka");
    $this->assertEquals($this->user->getLastName(), "Wonka");
  }

  public function test_full_name_is_returned() {
    $this->user->setFirstName("Billy");
    $this->user->setLastName("Wonka");

    $this->assertEquals($this->user->getFullName(), "Billy Wonka");
  }

  public function test_first_and_last_name_are_trimmed() {
    $this->user->setFirstName("  Billy   ");
    $this->user->setLastName("   Wonka  ");

    $this->assertEquals($this->user->getFirstName(), "Billy");
    $this->assertEquals($this->user->getLastName(), "Wonka");
  }

  public function test_email_address_can_be_set() {
    $this->user->setEmail("billy@mail.co");

    $this->assertEquals($this->user->getEmail(), "billy@mail.co");
  }

  public function test_email_variables_contain_correct_value() {
    $this->user->setFirstName("Billy");
    $this->user->setLastName("Wonka");
    $this->user->setEmail("billy@mail.co");

    $emailVariables = $this->user->getEmailVariables();

    $this->assertArrayHasKey("full_name", $emailVariables);
    $this->assertArrayHasKey("email", $emailVariables);

    $this->assertEquals($emailVariables["full_name"], "Billy Wonka");
    $this->assertEquals($emailVariables["email"], "billy@mail.co");
  }
}
