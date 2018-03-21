
<?php
namespace App\Controller;

use App\Controller\AppController;

class WebrootController extends AppController
{
  public function initialize(){
       parent::initialize();
       $this->loadModel('File');
  }
  public function Relaxtion(){
    $this->loadComponent(phwcfh/webroot/uploads/Relaxationtipstodownload.pdf)
  }
}
