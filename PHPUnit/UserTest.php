<?php 
  class userTest extends PHPUnit\Framework\TestCase {

    protected $user;

    public function setUp() :void {
        $this->user = new \App\Models\User;
    }

    public function testUserName() {
            
        $user = $this->user;

        $user->setUserName('test');

        $this->assertEquals($user->getUserName(), 'test');
    }

    public function testEmail () {
        $user = $this->user;

        $user->setEmail('test@test.com');

        $this->assertEquals($user->getEmail(), 'test@test.com');
    }

    public function testTrimUsername() {
        $user = $this->user;

        $user->setUserName('    test   ');

        $this->assertEquals($user->getUserName(), 'test');

    }

    public function testUserProperties() {
        $user = $this->user;

        $user->setUserName('test');
        $user->setEmail('test@test.com');

        $emailVariables = $user->getEmailVariables(); 
        $this->assertArrayHasKey('user_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['user_name'], 'test');
        $this->assertEquals($emailVariables['email'], 'test@test.com');
    }
  }

?>