<?php
namespace App\Controller;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Response\File;

/*Configure Cakepdf
Configure::write('CakePdf', [
    'engine' => 'CakePdf.DomPdf',
    'margin'=> [
        'bottom' => 15,
        'left' => 30,
        'right'=> 30,
        'top' => 25
    ],
    'orientation' => 'portrait',
    'download' => true,
    'filename' => 'Releases'.date(m-d-Y)
]);*/

class ReleasesController extends AppController
{
//    public $components = array('RequestHandler');
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    //    $this->loadComponent('RequestHandler');
    }
    public function index()
    {
        $releases = $this->Releases->find('all');
        $this->set(Compact('releases'));
    }
    public function view($id = null)
    {
        if(!$id)
        {
            throw new NotFoundException(__('Invalid release ID'));
        }
        $release  = $this->Releases->get($id);
        $this->set(compact('release'));
    }
    public function add()
    {
        $release = $this->Releases->newEntity();
        if($this->request->is('post'))
        {
            $release = $this->Releases->patchEntity($release, $this->request->data);
            if($this->Releases->save($release))
            {
                $this->request->session()->write('Release',$this->flattenData($this->request->data));
                $this->Flash->success(__('Your Release has been submitted'));
                return $this->redirect(['action'=>'add']);
            }
            $this->Flash->error(__('An Error occurred please try again'));
        }
        $this->set('release',$release);
    }
    private function flattenData($arg)
    {
        $session = $this->request->session();
        $str="".$session->read('Release');
        $item = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($arg));
        foreach($item as $i)
        {
            $str = $str."*".$i;
        }
        return $str."*!B@C0N!";
    }
    public function sesh()
    {
        $session = $this->request->session();
        $split = explode("!B@C0N!",$session->read('Release'));
        $data = array();
        foreach($split as $address)
        {
            $address = explode("*",$address);
            $data[] = $address;
        }
        array_pop($data);
//        $this->Flash->success(__(json_encode($data[1])));
        $this->set('data', $data);
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->viewVars(array('data'=> $data));
        $CakePdf->template('sesh','default');
//        $pdf = $CakePdf->output();
//        $pdf = $CakePdf->viewRender();
        $pdf = $CakePdf->write(APP . 'files'. DS . 'releases.pdf');
//        print_r(APP . 'files' . DS . 'releases.pdf');

    }
    public function download()
    {
        $this->response->file('files' . DS . 'releases.pdf', ['download' => true]);
        return $this->response;
    }
    public function clear()
    {
        $this->request->session()->write('Release',' ');
        return $this->redirect(['action'=> 'index']);
    }
    public function search()
    {
        $searchtype = $this->request->data('searchtype');
        $search = $this->request->data('search');
        $this->Flash->success(__('search'.$search."\t".$searchtype));
        $query = $this->Releases
                ->find()
                ->select(['streetno','street','city','inspector','rdate'])
                ->where([$searchtype.' =' => $search])
                ->order(['created' => 'DESC']);
        foreach($query as $release)
        {
            $this->Flash->success(__('Your query has been submitted'));
        }
        $this->set('query',$query);
    }
}
?>
