<?php
namespace Arch\Tests\Core\Helpers\FileOperations;
use Arch\Core\Helpers\FileOperations\FileExists as FileExists;

class FileExistsTest extends \PHPUnit_Framework_TestCase
{
  public function testFileExists()
  {
    // failing test - random file name which will not exist
    $filePointer = 'Core/RandomNonExistentDirectory/RandomFileNamexhjctgyutcgasghj.php';
    //initial test will fail
    $this->assertFalse(FileExists::exists($filePointer));

    // test using a file that should definitely exist
    $filePointer = 'Core/Config/bootstrap.php';
    // if the core has not been tampered with, this test should pass
    $this->assertTrue(FileExists::exists($filePointer));
  }
}